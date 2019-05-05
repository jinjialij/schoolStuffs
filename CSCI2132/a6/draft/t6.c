#include <stdio.h>
#include <stdlib.h>

/*remember to alloc struct before allocat pointer in it*/
/*remember to realloc struct before realloct pointers in it*/

struct inputText{
  unsigned int numline;
  char **pointerArr;//pointer of pointer,pointes to an array of pointers
};

int main(){
  struct inputText *in;
  in=NULL;
  in->pointerArr=NULL;
  //struct inputText *in = malloc(sizeof(struct inputText));

  in->numline=0;
  int cap=2,count=0;
  //in->pointerArr=malloc(sizeof(char *)*cap);//an array of 10 pointers
  
  cap=cap*2;
  in=realloc(in,cap*sizeof(struct inputText *));
  if(in == NULL){
    puts("Memory not allocated to struct.\n");
    return 1;
  }
  else
    puts("Allocated successfully");

  in->pointerArr=(char **)realloc(in,sizeof(char *)*cap);
  in->numline=0;
  if(in->pointerArr == NULL){
    puts("Memory not allocated to pointerArr.\n");
    return 1;
  }
  else
    puts("Allocated successfully");

  //printf("now pointerArr is %s\n",*in->pointerArr);
  size_t size=0;
  int number=0,numline2=-1;
  do{    
      number=getline(in->pointerArr, &size, stdin);
      count++;
      in->numline++;
      in->pointerArr++;
    //numline2=in->numline;
    if(count-cap<2){
      //numline2=in->numline;
      printf("cap now is %d, numline is %d, numline2 is %d, size of inputText is %zu, size of in->pointerArr is %zu\n",cap,in->numline,numline2,sizeof(struct inputText),sizeof(in->pointerArr));
      cap=cap*2;
      printf("cap is %d\n",cap);
      in=realloc(in,cap*sizeof(struct inputText *));
      //reallocate to doube size
      //in->numline=numline2;
      in->pointerArr=(char **)realloc(in,sizeof(char *)*cap);
      printf("After realloc, cap now is %d,num of line is %d, size of inputText is %zu, size of in->pointerArr is %zu\n",cap,in->numline,sizeof(struct inputText),sizeof(in->pointerArr));
      if(in==NULL||in->pointerArr==NULL){
	puts("failed");
      }
      else
	puts("succeed");
      //puts(*in->pointerArr++);
      printf("num of line : %d\n",in->numline);
      in->pointerArr=in->pointerArr+in->numline;//in->numline;//why????
      //printf("null is %s",*in->pointerArr);
    }
    /*
    else
      in->pointerArr++;
    */
  }while(number != -1);

  //printf("%s",*in->pointerArr-1);
  //in->pointerArr=in->pointerArr-in->numline+1;//count and in->numline is the same
  //int count=0;
  puts("resilt is: ");
  printf("num of line : %d\n",in->numline);
      
  for(count=0;count<in->numline-1;count++){
    printf("%s",*(in->pointerArr-in->numline+1+count));
    /*
    printf(" %s ",*in->pointerArr);
    in->pointerArr++;
    */
    }

  printf("1st: %s",*(in->pointerArr-in->numline+4));

}
