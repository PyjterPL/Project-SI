------------> PROSZĘ PRZECZYTAĆ <-------------



PROSZĘ USTAWIĆ MAKS DŁ.HASŁA W BAZIE DANYCH NA 70 ! inaczej utnie hasz i nie będzie możliwe zalogowanie się
Tradycyjnie, narazie tutaj, bo nie chciałbym uszkodzić bazy no i " u mnie działa". Wrzucę na główną jak tylko dostanę zielone światło. 
Co tym razem zostało zrobione:

- Dodano rejestracje, która nawet działa 
- Wszelakie sprawdzania poprawnosci maila,loginu,hasła 
- Sprawdzanie,czy login i mail się powtarzają w bazie 
- Hasło jest haszowane 
- Jest zaimplementowana reCAPTCHA od Google ( swoją drogą to naprawdę proste)
- Zapytania SQL wykorzystują Try-Catch 
- Dodałem podstronę z gratyfikacjami za rejestracje oraz z linkiem do index'u 

Co trzeba jeszcze będzie zrobić:
- AutoIncrement w phpmyadmin, tak wiem,że jest ale usunąłem manualnie jednego użytkownika i wydaje się,że zjadło go. W bazie brakuje UserID 2
- Dodawanie opisu, avatara i tym podobnych będzie w panelu ( jak się domyślamy jeszcze tego nie ma) 
- Kwestie rozdawania uprawnień --> to szybkiego obgadania.

