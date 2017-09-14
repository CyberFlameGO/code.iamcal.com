%{
	#include <stdio.h>
	int registers[26];
%}

%start lines
%token	ALPHA
	DIGIT
	DECIMAL_POINT
	OP_MULTIPLY
	OP_DIVIDE
	OP_MODULUS
	OP_ADDITION
	OP_SUBTRACTION
	OP_BITWISE_AND
	OP_BITWISE_OR
	OP_INCREMENT
	OP_DECREMENT
	ASSIGNMENT
	ASN_MULTIPLY
	ASN_DIVIDE
	ASN_MODULUS
	ASN_ADDITION
	ASN_SUBTRACTION
	ASN_BITWISE_AND
	ASN_BITWISE_OR

%left	OP_BITWISE_OR
%left	OP_BITWISE_AND
%left	OP_ADDITION
	OP_SUBTRACTION
%left	OP_MULTIPLY
	OP_DIVIDE
	OP_MODULUS
%left	UNARY_MINUS

%%

lines:		/* empty - to allow first command to match */
		| lines statement '\n' 
		| lines error '\n' 				{yyerrok;}
		;

statement:	expression					{printf("=%d\n",$1);}
		| ALPHA ASSIGNMENT expression			{registers[$1] = $3;}
		| ALPHA ASN_MULTIPLY expression			{registers[$1] = registers[$1] * $3;}
		| ALPHA ASN_DIVIDE expression			{registers[$1] = registers[$1] / $3;}
		| ALPHA ASN_MODULUS expression			{registers[$1] = registers[$1] % $3;}
		| ALPHA ASN_ADDITION expression			{registers[$1] = registers[$1] + $3;}
		| ALPHA ASN_SUBTRACTION expression		{registers[$1] = registers[$1] - $3;}
		| ALPHA ASN_BITWISE_AND expression		{registers[$1] = registers[$1] & $3;}
		| ALPHA ASN_BITWISE_OR expression		{registers[$1] = registers[$1] | $3;}
		| ALPHA OP_INCREMENT				{registers[$1] = registers[$1] + 1;}
		| ALPHA OP_DECREMENT				{registers[$1] = registers[$1] - 1;}
		;

expression:	'(' expression ')'				{$$ = $2;}
		| expression OP_MULTIPLY expression		{$$ = $1 * $3;}
		| expression OP_DIVIDE expression		{$$ = $1 / $3;}
		| expression OP_MODULUS expression		{$$ = $1 % $3;}
		| expression OP_ADDITION expression		{$$ = $1 + $3;}
		| expression OP_SUBTRACTION expression		{$$ = $1 - $3;}
		| expression OP_BITWISE_AND expression		{$$ = $1 & $3;}
		| expression OP_BITWISE_OR expression		{$$ = $1 | $3;}
		| OP_SUBTRACTION expression %prec UNARY_MINUS 	{$$ = -$2;}
		| ALPHA						{$$ = registers[$1];}
		| number
		;

number:		integer DECIMAL_POINT integer			{$$ = $1;} //we aren't doing decimals - chop them down
		| integer					{$$ = $1;}
		;

integer:	DIGIT						{$$ = $1;}
		| integer DIGIT					{$$ = (10 * $1) + $2;}
		;

%%

main(){
	return(yyparse());
}

yyerror(s) char *s; {
	fprintf(stderr, "error: %s\n",s);
}

yywrap(){
	return(1);
}
