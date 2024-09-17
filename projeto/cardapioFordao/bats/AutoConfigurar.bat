
cd ../

call composer install

IF EXIST ".env" (
    @REM nada   
) ELSE (
  copy ".env.example" "./bats/"

    cd ./bats/

    ren ".env.example" ".env"

    move ".env" ../
)



cls

@echo Va no arquivo .env, na linha 22 ate a linha 27 e coloque os seguintes dados:
@echo DB_CONNECTION=mysql
@echo DB_HOST=127.0.0.1
@echo DB_PORT=3306
@echo DB_DATABASE=cardapioFordao
@echo DB_USERNAME=root
@echo DB_PASSWORD=
@echo --------
@echo *Lembre se de tirar os jogos da velha no comeco das linhas acima
@echo *Continue apenas apos ter feito o que pedido acima e se estiver com o xampp ligado 

pause

@REM cd../

call php artisan key:generate
 
call php artisan migrate

call php artisan db:seed

pause

cls
@echo Se fechar este prompt de comando, o server sera parado

call php artisan serve




