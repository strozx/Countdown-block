# Countdown-block
Najprej sem uvozil že narejeno MySQL bazo. To sem storil v ukazni vrstici z ukazom: mysql -u root -p challenge_base < agiledrop_dev_challenge_8.6.1.sql.
Bazo je bilo potrebno uvozit z ukazom, ker phpmyadmin ni hotel izvesti LOCK TABLE ukaza. Potem sem namestil Drupal in vpisal ime že narejene baze, obenem pa sem si namestil še drush z ukazom composer global require drush/drush.
Zatem sem ustvaril ogrodje modula in izpolnil info.yml file. Programiranja sem se lotil tako, da sem po spletu pobrskal na kakšen način se dajo pridobiti podatki o eventu.
Ko sem to našel, sem spisal metodo kjer dobi kot parameter epoch čas kdaj je event in ga odšteje od trenutnega časa, zatem pa se preko if stavkov nastavi pogoj ali je event že potekel ali trenutno traja ali se pa še ni zgodil. Prav tako sem uporabil xdebug za debugeranje.
