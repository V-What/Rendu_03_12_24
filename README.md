# Tache

-

## Fonctionnalités
- **Lister les tâches** : `GET /tasks`
- **Créer une tâche** : `POST /tasks` (JSON requis)

## Installation
1. Clonez le dépôt :
   ```bash
   git clone https://github.com/V-What/Rendu_03_12_24.git
   ```
2. Installez les dépendances avec Composer :
   ```bash
   composer install
   ```
3. Lancez le serveur Symfony (PHP) :
   ```bash
   php -S 127.0.0.1:8000 -t public
   ```
4. Accédez à l'application dans votre navigateur ou testez les routes avec Postman/cURL.

## Exemple de routes
### `GET /tasks`
Retourne toutes les tâches :
```json
[
    {
        "id": "647c8b4c4f5",
        "title": "Ma première tâche",
        "description": "Description de la tâche",
        "status": "todo",
        "created_at": "2023-12-03 15:00:00",
        "updated_at": "2023-12-03 15:00:00"
    }
]
```

### `POST /tasks`
Crée une nouvelle tâche. Exemple de payload :
```json
{
    "title": "Nouvelle tâche",
    "description": "Description de la tâche"
}
```
