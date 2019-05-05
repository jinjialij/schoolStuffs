#include <stdio.h>
#include <stdlib.h>

struct inputText{
  unsigned int numline;
  char **pointerArr;//pointer of pointer,pointes to an array of pointers
};

int main(){
  struct inputText *in = malloc(sizeof(struct inputText));
  //struct inputText in;//=(struct inputText*)malloc(sizeof(struct inputText));
  in->numline=0;
  int cap=3,count=0;
  in->pointerArr=malloc(sizeof(char *)*cap);//an array of 10 pointers

  size_t size=0;
  int number=0;
  do{
    number=getline(in->pointerArr, &size, stdin);
    count++;
    in->numline++;
    if(count==cap-2){
      cap=cap*2;
      printf("cap is %d\n",cap);
      in->pointerArr=realloc(in->pointerArr,cap*sizeof(char *));//reallocate to doube size
    }
    in->pointerArr++;
  }while(number != -1);
}
