import cv2
import numpy as np
import tensorflow as tf
from tensorflow.keras.applications import VGG16
from tensorflow.keras.models import Model
from tensorflow.keras.layers import Convolution2D, Flatten, Activation
from tensorflow.keras.utils import get_file

# Fonction pour préparer l'image pour la prédiction
def preprocess_image(img, target_size=(224, 224)):
    img = cv2.cvtColor(img, cv2.COLOR_BGR2RGB)  # Convertir BGR en RGB
    img = cv2.resize(img, target_size)  # Redimensionner
    img = np.expand_dims(img, axis=0)  # Ajouter la dimension du batch
    img = img / 255.0  # Normaliser
    return img

# Fonction pour créer un modèle avec les poids chargés depuis l'URL
def create_model(weights_url, num_classes):
    base_model = VGG16(weights=None, include_top=False, input_shape=(224, 224, 3))

    # Ajouter les couches de classification
    x = base_model.output
    x = Convolution2D(num_classes, (1, 1), name="predictions")(x)
    x = Flatten()(x)
    x = Activation("softmax")(x)

    model = Model(inputs=base_model.input, outputs=x)

    # Charger les poids depuis l'URL
    weights_path = get_file('model_weights.h5', weights_url)
    model.load_weights(weights_path)
    return model

# URLs des poids
age_weights_url = "https://github.com/serengil/deepface_models/releases/download/v1.0/age_model_weights.h5"
gender_weights_url = "https://github.com/serengil/deepface_models/releases/download/v1.0/gender_model_weights.h5"

# Charger les modèles d'âge et de genre
try:
    age_model = create_model(age_weights_url, 101)  # 101 classes pour l'âge
    gender_model = create_model(gender_weights_url, 2)  # 2 classes pour le genre (homme/femme)
    print("Age and gender models loaded successfully.")
except Exception as e:
    print(f"Error loading models: {e}")
    age_model = None
    gender_model = None

# Charger le classificateur de visages d'OpenCV
face_cascade = cv2.CascadeClassifier(cv2.data.haarcascades + 'haarcascade_frontalface_default.xml')

# Initialiser la webcam
camera = cv2.VideoCapture(0)

# Délai entre les analyses (en secondes)
analysis_interval = 5
last_analysis_time = time.time()

def find_apparent_age(age_predictions):
    output_indexes = np.arange(0, 101)
    apparent_age = np.sum(age_predictions * output_indexes)
    return apparent_age

while True:
    # Capturer une image de la webcam
    ret, frame = camera.read()
    if not ret:
        print("Failed to grab frame")
        break

    # Convertir l'image en niveaux de gris pour la détection des visages
    gray = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

    # Détecter les visages
    faces = face_cascade.detectMultiScale(gray, scaleFactor=1.1, minNeighbors=5, minSize=(30, 30))

    # Traiter chaque visage détecté
    for (x, y, w, h) in faces:
        # Extraire le visage de l'image
        face_img = frame[y:y+h, x:x+w]
        
        # Préparer l'image pour la prédiction
        preprocessed_img = preprocess_image(face_img)

        # Effectuer la prédiction si les modèles sont chargés
        if age_model is not None and gender_model is not None:
            try:
                age_predictions = age_model.predict(preprocessed_img)[0]  # Prédiction d'âge
                apparent_age = find_apparent_age(age_predictions)
                print(f"Predicted age: {apparent_age:.2f}")

                # Prédiction du genre
                gender_predictions = gender_model.predict(preprocessed_img)[0]
                gender = 'Male' if np.argmax(gender_predictions) == 0 else 'Female'
                print(f"Predicted gender: {gender}")
                
            except Exception as e:
                print(f"Error in predicting age or gender: {e}")

        # Dessiner un rectangle autour du visage détecté
        cv2.rectangle(frame, (x, y), (x+w, y+h), (255, 0, 0), 2)

    # Afficher l'image avec les détections
    cv2.imshow('Webcam', frame)

    # Quitter la boucle si la touche 'q' est pressée
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Libérer les ressources
camera.release()
cv2.destroyAllWindows()
