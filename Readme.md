Small scale microservice application on "note book"

**Client;**

*VueJs variables;*

    authApiUrl: "http://localhost:8000/api",
    notebookApiUrl: "http://localhost:8001/api",
    
-
**Api;**

*Auth Project;*

    env: DB_DATABASE=micro-notebook-auth
    command: composer dumpautoload
    command: php artisan migrate
    command: php artisan serve --port=8000

*Notebook Project;*

    env: DB_DATABASE=micro-notebook-notes
    command: composer dumpautoload
    command: php artisan migrate
    command: php artisan serve --port=8001
