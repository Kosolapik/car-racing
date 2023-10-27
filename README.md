<h3>Запускаем Docker</h3>
<p>docker compose up -d</p>

<h3>Входим в контейнер приложения и запускаем сервер Laravel</h3>
<p>docker exec -it app bash</p>
<p>php artisan serve</p>

<h3>Входим в контейнер для Vite и запускаем его</h3>
<p>docker exec -it vite bash</p>
<p>npm run dev</p>

<h3>Приложение будет доступно на порте 8000</h3>