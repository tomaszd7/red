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

3. Update your system host file (add red.app alias)

    ```bash
    # UNIX only: get containers IP address and update host (replace IP according to your configuration) (on Windows, edit C:\Windows\System32\drivers\etc\hosts)
    $ sudo echo $(docker network inspect bridge | grep Gateway | grep -o -E '[0-9\.]+') "red.app" >> /etc/hosts
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

# red

### Uwagi ogólne
Sam opis zadania nie jest dobrze sprecyzowany a nawet sprzeczny. No cóż.  
Założyłem, że zadaniem będzie napisanie silnika do przyporządkowania paczek 
z samochodów  
przyjeżdających na samochody firmy. 


### Uwagi techniczne
Zadanie napisane jest w:
* PHP 7.1 z własnym środowiskiem dockerowym
* obiektowo przy użyciu dziedziczenia i interfejsów
* implementuje magic method `toString()` dla prostego wydruku


### Uruchomienie
Po zastosowaniu instrukcji z README.md dockerowego aplikacja wywoła się na 
`localhost:81`   
i wyświetli testową wersję. 


### Zastosowanie
##### Załadunek 
Przygotowanie danych zaczyna się od utworzenie tablicy przyjeżdzających  
samochodów np:  
`$incomingTruck1 = new IncomingPackageTruck();`  
`$incomingMachineTruck = new IncomingMachineTruck();`

 Dla samochodów z paczkami należy dodać ładunek (samochody z maszynami już  
 mają go w sobie). Można do tego użyć helpera:  
 `$load1 = PackageGenerator::generatePackages(15);`  
 `$incomingTruck1->load($load1);`
 
 ##### Przepakowanie
 Aplikację instancjuje klasa `Packer::class`   
  `$packer = new Packer();`  
  do które ładujemy transport jako tablicę:   
  `$packer->registerIncomingVehicles([$incomingTruck1, $incomingMachineTruck]);`  
i wykonujemy przepakowanie:  
`$packer->packToOurTransport();`


##### Wydruk
Sposób działania podejrzymy prostym wydrukiem:  
`echo nl2br($packer);` 
 

### Logika
* Logika jest uproszczona: paczki przepakowywane są po kolei, tzn. gdy kolejna paczka nie mieści się  
w danym samochodzie przechodzi na następny (nie próbuje się dołożyć paczki mniejszej).    
* Założone są asercje na warunki brzegowe jednak błędy zatrzymują całą aplikację a nie tylko jej część. 
* Exception `VehicleIsFullException` jest rzucany specjalnie jako informacja o kolejnym samochodzie.  
* identyfikacja paczek następuje jako UUID string 
 

