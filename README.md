# mini-programming-language

## Language Specification

### 1. Language Definition
* Alphabet:
    * Upper (A-Z) and lower case (a-z) letters of the English alphabet
    * Underline charcter '_'
    * Decimal digits (0-9)


* Lexic:
    * Special symbols:
        * operators     
            * relational: **=, <>, <, >, <]** (<=), **[>** (>=)
            * aritmetici: **+,-,*,/, %,**
            * logici: **#**(and), **##**(or)
        * assigment: **<-**
        * separators: **(), [], begin, end, space, .**
        * reserved words: **if, else, for, while, const, int, program, begin, end, read, write, writeln let, list_of_integer, list_of_string, func, call, and, or**
    * Identifiers ( *a seq. of 3 letters at least* )
        ```pseudo
        letter lower case ::= "a" | "b" | ... | "z" ;   

        letter ::= letter lower case | "A" | "B" | ... | "Z" ;

        identifier ::= letter lower case , {letter lower case "_"} ;
        ```
    * Constants
        1. **integer**
            ```pseudo
            digit ::= "0" | "1" | "2" | "3" | "4" | "5" | "6" | "7" | "8" | "9" ;

            integer ::= ["-"], digit, {digit} ;
            ```
        2. **string**
            ```pseudo
            character ::= "letter" | "digit" ; 

            string ::= '"', character, {character - '"'}, '"' ;
            ```
### 2. Syntax
* Rules
```pseudo
    program ::= ("PROGRAM" | "program"), space, identifier, space,
                ("BEGIN" | "begin"), space, 
                declarationList, ";", instructions,
                "END." ;
    declarationList :: = declaration | declaration, ";", space, declarationList ;
    declaration ::= assignment, ";" ;
                
    assignment ::= identifier , [space], "<-", (integer | string) ; 
    space ::= ? space character ?
```    