## 3. UK Postcode Regular Expression

The following is the UK Postcode Regular Expression and the corresponding detail explaining the logic behind the UK Postcode Regular Expression.

### 3.1 Expression

^([Gg][Ii][Rr] 0[Aa]{2})|((([A-Za-z][0-9]{1,2})|(([A-Za-z][A-Ha-hJ-Yj-y][0-9]{1,2})|(([AZa-z][0-9][A-Za-z])|([A-Za-z][A-Ha-hJ-Yj-y][0-9]?[A-Za-z]))))
[0-9][A-Za-z]{2})$

### 3.2 Logic

"GIR 0AA"

OR
    One letter followed by either one or two numbers
OR
    One letter followed by a second letter that must be one of ABCDEFGHJ
    KLMNOPQRSTUVWXY (i.e..not I) and then followed by either one or two
    numbers
OR
    One letter followed by one number and then another letter
OR
    A two part post code
        where the first part must be
        One letter followed by a second letter that must be one of ABCDEFGH
        JKLMNOPQRSTUVWXY (i.e..not I) and then followed by one number and
        optionally a further letter after that
AND
    The second part (separated by a space from the first part) must be One
    number followed by two letters.

A combination of upper and lower case characters is allowed.

Note: the length is determined by the regular expression and is between 2 and 8
characters.