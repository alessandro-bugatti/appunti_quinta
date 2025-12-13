# Importare un database via SSH 

## 🧭 Obiettivi della lezione

-   Trasferire un dump SQL da Windows a Linux via **SCP**
-   Importare un database tramite **SSH**
-   Comprendere l'uso sicuro delle **password**
-   Verificare il corretto import dei dati

## 📦 Prerequisiti (Studenti su Windows)

-   Git Bash installato (include `ssh` e `scp`)
-   File `tennis.sql`
-   Credenziali **SSH** e **MariaDB** personali
-   Accesso al server Linux

## 🔹 1.a Trasferimento file via SCP

Da **terminale**:

``` bash
scp tennis.sql username@winnie:/home/username/
```
## 🔹 1.b Oppure normale deployment

In questo caso però il file andrà probabilmente in una sottocartella della propria home, quindi dovrebbero essere cambiate alcune istruzioni seguenti.

## 🔹 2. Import del dump via SSH

``` bash
ssh username@winnie
mysql -u username -p db_username < tennis.sql
```

## 🔹 3. Verifica dell'import

``` bash
ssh username@winnie
mysql -u username -p db_username
```

``` sql
SHOW TABLES;
SELECT * FROM tennista;
```

## Per riportare tutto come prima
```bash
ssh username@winnie
rm tennis.sql
mysql -u username -p db_username
```

```sql
DROP TABLE societa;
DROP TABLE tennista;
```

# E adesso provate a rifare tutto


