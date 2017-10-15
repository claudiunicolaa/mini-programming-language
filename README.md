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
        letter lower case = "a" | "b" | ... | "z" ;   

        letter = letter lower case | "A" | "B" | ... | "Z" ;

        identifier = letter lower case , {letter lower case "_"} ;
        ```
    * Constants
        1. **integer**
            ```pseudo
            digit = "0" | "1" | "2" | "3" | "4" | "5" | "6" | "7" | "8" | "9" ;

            integer = ["-"], digit, {digit} ;
            ```
        2. **string**
            ```pseudo
            character = "letter" | "digit" ; 

            string = '"', character, {character - '"'}, '"' ;
            ```
        3. **boolean**
            ```pseudo
            boolean = "0" | "1" ; 
            ```
### 2. Syntax
* Rules
```pseudo
    program = "PROGRAM", space, identifier, space,
                "BEGIN", space, 
                listDeclaration, ";", instructions,
                "END." ;

    listDeclaration :: = declaration | declaration, ";", space, listDeclaration ;

    declaration = ("LET" | "let"), identifier, [space], assignment, [space], ":", [space], type ;

    assignment = identifier , [space], "<-", (integer | string) ; 

    type = "bool" | "int" | "string" ;

    arrayDeclaration = "list_of_integer", "[", no., "]", [space], ":", [space], type;                
    
    instructions = "begin", (instruction | instruction, ";", space, instructions)  ,"end" ; 

    instruction = simpleInstruction | complexInstruction ;

    simpleInstruction = assignment | io ;

    complexInstruction = instructions | ifInstruction | whileInstruction ; 

    ifInstruction = "if", "(", condition, ")", "then", "begin", instruction, "end", ["else", "begin", instruction, "end"] ;

    whileInstruction = "while", "(", condition, ")", "execute", "begin", instruction, "end" ;

    io = ("read" | "write"), "(" indentifier ")" ;

    space = ? space character ? ;
```    