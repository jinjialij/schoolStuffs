#include <stdio.h>
#include <stdlib.h>

/*remember to alloc struct before allocat pointer in it*/
/*remember to realloc struct before realloct pointers in it*/

struct inputText{
  unsigned int numline;
  char **pointerArr;//pointer of pointer,pointes to an array of pointers
};

int main(){
  struct inputText *in = malloc(sizeof(struct inputText));

  in->numline=0;
  int cap=3,count=0;
  in->pointerArr=malloc(sizeof(char *)*cap);//an array of 10 pointers
  if(in->pointerArr == NULL){
    puts("Memory not allocated to pointerArr.\n");
    return 1;
  }
  else
    puts("Allocated successfully\n");
  size_t size=0;
  int number=0;
  do{
    number=getline(in->pointerArr, &size, stdin);
    count++;
    in->numline++;
    if(count>cap-2){
      printf("cap now is %d, size of inputText is %zu, size of in->pointerArr is %zu\n",cap,sizeof(struct inputText),sizeof(in->pointerArr));
      cap=cap*2;
      printf("cap is %d\n",cap);
      in=realloc(in,cap*sizeof(struct inputText *));
      //reallocate to doube size
      in->pointerArr=(char **)realloc(in,sizeof(char *)*cap);
      printf("After realloc, cap now is %d, size of inputText is %zu, size of in->pointerArr is %zu\n",cap,sizeof(struct inputText),sizeof(in->pointerArr));
      if(in==NULL||in->pointerArr==NULL){
	puts("failed");
      }
      else
	puts("succeed");
      in->pointerArr=in->pointerArr+in->numline+1;
    }
    else
      in->pointerArr++;
  }while(number != -1);

  in->pointerArr=in->pointerArr-in->numline+1;
  //int count=0;
  for(count=0;count<in->numline;count++){
    printf("%s",*in->pointerArr);
    in->pointerArr++;
  }



}
