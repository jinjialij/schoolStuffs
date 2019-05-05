#include <stdio.h>
#include <stdlib.h>

struct inputText{
  unsigned int numline;
  char **pointerArr;
//pointer of pointer,pointes to an array of pointers that allocates 5 pointers
};

int main(){
  struct inputText in;
  in.numline=0;
  int cap=10,count=0;
  //char *pArr=malloc(sizeof(char *)*cap);
  in.pointerArr=malloc(sizeof(char *)*cap);//an array of 5 pointers

  size_t size=0;
  int number=0;
  do{
    //*in.pointerArr=malloc(sizeof(char)*5);//element of the array of pointers 
    number=getline(in.pointerArr, &size, stdin);
    //printf("num=%d \n",number);
    //printf("you type   %s",*(in.pointerArr));
    count++;
    in.numline++;
    if(count>cap-1){
      cap=sizeof(in.pointerArr)*2;
      in.pointerArr=realloc(in.pointerArr,cap);//reallocate to doube size
    }
    if(count>=2){
      if(strcmp(*(in.pointerArr-1),*(in.pointerArr))!=0){
	in.pointerArr++;//let new input line replace the duplicated one
	//printf("\n *not duplicate* \n");
      }
      else 
	in.numline--;
    }
    else
      in.pointerArr++;
  }while(number != -1);
  //compare each line
  printf("\nresult: \n");
  //*in.pointerArr=&(*in.pointerArr[0]);
  //printf("%s",*(in.pointerArr-in.numline));

  for(count=0;count<in.numline;count++){
    printf("%s",*(in.pointerArr-in.numline+count));
   }

}



