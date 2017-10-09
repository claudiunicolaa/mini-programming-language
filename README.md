# mini-programming-language

# Language Specification

## 1. Language Definition
* Alphabet:
    * Upper (A-Z) and lower case (a-z) letters of the English alphabet
    * Underline charcter '_'
    * Decimal digits (0-9)


* Lexic:
    * Special symbols:
        * operators     
            * relational: **=, <>, <, >, <](<=), [>(>=)**
            * aritmetici: **+,-,*,/, %,**
            * logici: **#**(and), **##**(or)
        * assigment: **<-**
        * separators: **(), [], begin, end, space, .**
        * reserved words: **if, else, for, while, const, int, program, begin, end, read, write, let**
    * Identifiers ( *a seq. of 3 letters at least* )
        ```
        letter lower case ::= "a" | "b" | ... | "z" ;    `

        letter ::= letter lower case | "A" | "B" | ... | "Z" ;

        identifier ::= letter lower case , {letter lower case | "_"} ;
       `` 

    * Constants
        1. **integer**
            ```
            digit ::= "0" | "1" | "2" | "3" | "4" | "5" | "6" | "7" | "8" | "9" ;

            integer ::= ["-"], digit, {digit} ;
            ```

        2. **string**
            ```
            character ::= "letter" | "digit" ; 

            string ::= '"', character, {character - '"'}, '"' ;
            ```
