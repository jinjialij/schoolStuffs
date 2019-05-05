#include <stdio.h>
#include <stdlib.h>
#include <string.h>
int main(){
  char **newArr;
  newArr=malloc(cap*sizeof(char *));
  if(newArr== NULL){
    puts("Fail");
    return 1;
  }
  else{
    puts("newArr malloc succeed");
    printf("size of newArr: %d\n",sizeof(newArr));
  }
  int cap2=0,i=0;
  *newArr="the first element";//18
  char *a;
  a=malloc(sizeof(*newArr));
  if(a== NULL){
    puts("Fail");
    return 1;
  }
  else{
    puts("a malloc succeed");
    printf("size of a: %d\n",sizeof(a));
  }
  if(sizeof(*newArr)==sizeof(*in->pointerArr)){
    puts("newArr size == pointerArr str");
}





}
