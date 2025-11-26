create table tennis.tennista
(
    id           int unsigned auto_increment
        primary key,
    nome         varchar(50)     not null,
    cognome      varchar(50)     not null,
    data_nascita date            not null,
    sesso        enum ('M', 'F') null
);

