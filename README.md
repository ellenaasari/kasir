<h1 align="center">kasir-1</h1>
project kasir ini merupakan project milik bapak Agus Budi Setiyawan, S.Kom. sebagai guru pengajar kelas XII RPL

> MataPelajaran : Pemrograman WEB
## Installation
1. Clone this project
    ```bash
    git clone https://github.com/ellenaasari/kasir-1.git
    cd kasir-1
    ```
2. Install dependencies
    ```bash
    composer install
    ```
    And javascript dependencies
    ```bash
    yarn install && yarn dev

    #OR

    npm install && npm run dev
    ```

3. Set up Laravel configurations
    ```bash
    copy .env.example .env
    php artisan key:generate
    ```

4. Set your database in .env

5. Migrate database
    ```bash
    php artisan migrate
    ```

6. Serve the application
    ```bash
    php artisan serve
    ```

7. Login credentials
