#include <stdio.h>

int input(char *s, int length);

int main (){
  char *text;
  size_t capacity = 100;
  int numchars;
  text=(char *) malloc (capacity *2);
  numchars = getline(&text, &capacity, stdin); 
  if(numchars != -1){
    puts(text);
  }
  printf("%zu\n",numchars);
  printf("%s\n",text);
  return 0;
  //free(text);




/*
  char buffer[32];
  char *b = buffer;
  size_t bufsize = 32;
  size_t characters;

  printf("Type something: ");
  characters = getline(&b,&bufsize,stdin);
  printf("%zu characters were read.\n",characters);
  printf("You typed: '%s'\n",buffer);

  return(0);

  */

}
