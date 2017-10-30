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
            * arithmetic: **+,-,*,/, %,**
        * assigment: **<-**
        * separators: **(), [], begin, end, space, .**
        * reserved words: **if, else, for, while, const, int, program, begin, end, read, write, writeln, let, list_of_integer, list_of_string, func, call, and, or**
    * Identifiers ( *a seq. of 3 letters at least* )
        ```pseudo
        letter lower case = "a" | "b" | ... | "z" ;   

        letter = letter lower case | "A" | "B" | ... | "Z" ;

        identifier = letter lower case {letter lower case "_"} ;
        ```
    * Constants
        1. **integer**
            ```pseudo
            zero  = "0" ;
            
            digit = "1" | "2" | "3" | "4" | "5" | "6" | "7" | "8" | "9" ;

            integer = ["-"] digit {zero | digit | zerozero} ;
            ```
        2. **string**
            ```pseudo
            character = "letter" | "digit" ; 

            string = '"' character {character - '"'} '"' ;
            ```
        3. **boolean**
            ```pseudo
            boolean = "0" | "1" ; 
            ```
### 2. Syntax
* Rules
    * syntax 
    
```pseudo
    program = "PROGRAM" identifier "BEGIN" listDeclaration ";" instructions "END." ;

    listDeclaration = declaration | declaration";" listDeclaration ;

    declaration = "let" identifier assignment ":" type ;

    type = "bool" | "int" | "string" ;

    arrayDeclaration = "list" "[", no., "]" identifier ":" type;              
    
    instructions = instruction | instruction ";" instructions ; 

    instruction = simpleInstruction | complexInstruction ;

    simpleInstruction = assignment | io ;

    complexInstruction = instructions | ifInstruction | whileInstruction ; 

    ifInstruction = "if" "(" condition ")" "then" "begin" instruction "end"  ["else" "begin" instruction "end"] ;

    whileInstruction = "while" "(" condition ")" "execute" "begin" instruction "end" ;

    io = ("read" "(" indentifier ")" | "write") "(" (indentifier | string) ")" ;
    
    assignment = identifier "<-" (integer | string | expresie) ;

    expression = expression ("+" | "-") term | term ; 

    term = term ("*" | "/") factor | factor ;

    factor = "(" expression ")" | identifier | integer  ;

    condition = expression relation expression ;
``` 

* lexical

```pseudo
    identifier = letter lower case | letter lower case {letter lower case} {digit};
    letter lower case = "a" | "b" | ... | "z" ;
    digit =  "0" | "1" | ... | "9" ;
    relation =  "<>" | "<" | "<]" | "=" | "[>" | ">" ;
```

The tokens are codified according to the following 2 tables:

### Indentifiers
| Token type       | Code  |  
|------------------|-------|
|  indentifiers    | 0     |
|  constants       | 1     |
|  program         | 2     |
|  begin           | 3     |
|  end             | 4     |
|  let             | 5     |
|  list            | 6     |
|  if              | 7     |
|  then            | 8     |
|  else            | 9     |
|  while           | 10    |
|  execute         | 11    |
|  read            | 12    |
|  write           | 13    |
|  <-              | 14    |
|  :               | 15    |
|  ;               | 16    |
|  ,               | 17    |
|  .               | 18    |
|  +               | 19    |
|  -               | 20    |
|  *               | 21    |
|  /               | 22    |
|  (               | 23    |
|  )               | 24    |
|  [               | 25    |
|  ]               | 26    |
|  =               | 27    |
|  <>              | 28    |
|  <               | 29    |
|  >               | 30    |

## Scanner Documentation

Reserved words, operators and separators are stored in a HashTable chaining with simpled linked list, using the hash function: 
```
chars <- split key(string) in chars
sum   <- 0;
foreach (chars as char) {
    sum <- sum + ord($char);
}

return sum mod size of HashTable
```

The scanner has two levels of verifications:

- **level one**: it's checking if the token is a reserved word, an operator or a separator. If one of this conditions is true, a new entry on Program Internal Form it's added ***(name, code, position in symbol table=-1)***


- **level two**: it's checking using a regular expression if the tokens is an identifier or a constant. If one of this conditions is true, a new entry on Program Internal Form it's added ***(name, code, position in symbol table)*** 

```
identifier regex: (\b(([a-z]+_*)|([a-z_]+))\b) 


constant regex: (((\s|^)([+-]?[1-9]+[0-9]*))|((\s|^)([+-]?[0-9]+\.[0-9]+[1-9]))|((?<=").*(?="))|((\s|^)0))
```

The Symbol and Program Internal Form table are separated, each of them has there data structure assigned.

