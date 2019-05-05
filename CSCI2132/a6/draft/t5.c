#include <stdio.h>
#include <stdlib.h>
#include <string.h>
//compare function

struct inputText{
  unsigned int numline;
  char **pointerArr;//pointer of pointer,pointes to an array of pointers
};

int main(){
  struct inputText *in=malloc(sizeof(struct inputText));
  in->numline=0;
  int cap=10,count=0;
  in->pointerArr=malloc(sizeof(char *)*cap);//mallocat for pointerArr, an array contains 10 pointers
  size_t size=0;
  int number=0;
  do{
    number=getline(in->pointerArr, &size, stdin);
    count++;
    in->numline++;
   //realloc
    if(count>cap-1){
      cap=cap*2;
      in=realloc(in,cap*sizeof(struct inputText *));//realloc strcut
      if(in->pointerArr==NULL){
	puts("Fail to realloc");
	return 1;
      }
      else{
	printf("Success to allocat");
      }
      
      in->pointerArr=(char**)realloc(in,cap*sizeof(char *));//realloc the array of pointers to size of double cap
      if(in->pointerArr==NULL){
	puts("Fail to realloc");
	return 1;
      }
      else{
	/*printf("Success to allocat,cap now is %d,pointerArr is %s\n",cap,*in->pointerArr);*/
	puts("success");
      }
      
      in->pointerArr=in->pointerArr+in->numline+1;
      //in->pointerArr=in->pointerArr+in->numline+1;//realloc the pointer in the struct
    }
    else
      in->pointerArr++;
  }while(number != -1);
}  
