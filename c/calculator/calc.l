%{
 	#include <stdio.h>
	#include "y.tab.h"
	extern int yylval;
%}

%%

" "	{}

"."	{return(DECIMAL_POINT);}
"="	{return(ASSIGNMENT);}

"++"	{return(OP_INCREMENT);}
"--"	{return(OP_DECREMENT);}

"*="	{return(ASN_MULTIPLY);}
"/="	{return(ASN_DIVIDE);}
"%="	{return(ASN_MODULUS);}
"+="	{return(ASN_ADDITION);}
"-="	{return(ASN_SUBTRACTION);}
"&="	{return(ASN_BITWISE_AND);}
"|="	{return(ASN_BITWISE_OR);}

"*"	{return(OP_MULTIPLY);}
"/"	{return(OP_DIVIDE);}
"%"	{return(OP_MODULUS);}
"+"	{return(OP_ADDITION);}
"-"	{return(OP_SUBTRACTION);}
"&"	{return(OP_BITWISE_AND);}
"|"	{return(OP_BITWISE_OR);}

[a-z]	{yylval = yytext[0] - 'a'; return(ALPHA);}
[A-Z]	{yylval = yytext[0] - 'A'; return(ALPHA);}
[0-9]	{yylval = yytext[0] - '0'; return(DIGIT);}

[^a-zA-Z0-9]	{return(yytext[0]);}

