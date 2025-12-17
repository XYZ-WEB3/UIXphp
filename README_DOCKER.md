Docker quick start

Prereqs
- Docker Desktop installed and running (Windows/macOS) or Docker Engine (Linux).

Run
- Open a terminal in this folder.
- Start the stack: docker compose up -d
- Open: http://localhost:8000/quiz.html

Stop
- docker compose down

Notes
- The current directory is mounted into /var/www/html in the container. Any changes you make to files appear immediately in the running container.
- If port 8000 is busy, change the host port in docker-compose.yml under ports (e.g., "8080:80").
- The Apache document root is /var/www/html; PHP files (e.g., quiz_process.php, task_2_1.php) will execute under the container.

