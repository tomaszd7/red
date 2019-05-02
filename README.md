# Docker

## Environment
    php 7.1
    ngnix webserver

## Installation

1. Check `.env` file for its source folder
    
2. Build/run containers with (with and without detached mode)

    ```bash
    $ docker-compose build
    $ docker-compose up -d
    ```

3. Update your system host file (add symfony.local)

    ```bash
    # UNIX only: get containers IP address and update host (replace IP according to your configuration) (on Windows, edit C:\Windows\System32\drivers\etc\hosts)
    $ sudo echo $(docker network inspect bridge | grep Gateway | grep -o -E '[0-9\.]+') "blue.app" >> /etc/hosts
    ```

4. Prepare application
    
    1. Composer install 

        ```bash
        $ docker-compose exec php bash
        $ composer install
        ```
    2. Check logs folder access
        Make sure user www-data has access to .app/src/logs folder 
        ```bash
        $ chmod 777 logs        
        ```

5. Enjoy :-)

