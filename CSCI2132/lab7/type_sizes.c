#include <stdio.h>
#include <stdbool.h>
int main (){
  /*size_t is the type sizeof() returns so use zu format specifier. */
  printf("sizeof(char) =  %zu\n", sizeof(char));
  printf("sizeof(bool) =  %zu\n", sizeof(bool));
  printf("sizeof(int) =   %zu\n", sizeof(int));
  printf("sizeof(short int) =  %zu\n", sizeof(short int));
  printf("sizeof(unsigned long int) =  %zu\n", sizeof(unsigned long int));
  printf("sizeof(float) =  %zu\n", sizeof(float));
  printf("sizeof(double) = %zu\n", sizeof(double));
  printf("sizeof(long double) = %zu\n", sizeof(long double));
  return 0;

}
