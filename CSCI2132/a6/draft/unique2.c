#include <stdio.h>
#include <stdlib.h>
#include <string.h>


//compare function
int cmpfunc(const void *a,const void *b){
  return strcmp(*(char* const *)a, *(char* const *)b);
}

struct inputText{
  unsigned int numline;
  char **pointerArr;//pointer of pointer,pointes to an array of pointers
};

struct lines{
  int lnum;//line number
  char *line;
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
	printf("Success to realloc,cap is %d",cap);
      }
      in->pointerArr=in->pointerArr+in->numline+1;
      //in->pointerArr=in->pointerArr+in->numline+1;//realloc the pointer in the struct
    }
    else
      in->pointerArr++;
  }while(number != -1);

  //compare each line
  printf("\nresult: \n");
  puts("before sort");
  for(count=0;count<in->numline;count++){
    printf("%s",*(in->pointerArr-in->numline+count));
   }
  qsort((in->pointerArr-in->numline),in->numline-1,sizeof(char*),cmpfunc);
  puts("After sort");
  for(count=0;count<in->numline;count++){
    printf("%s",*(in->pointerArr-in->numline+count));
  }

  //delete duplicate
  //create a new arry of pointers
  char **newArr;
  newArr=malloc(cap*sizeof(char *));
  if(newArr== NULL){
    puts("Fail");
    return 1;
  }

  int cap2=0,i=0;
  //go over the in->pointerArr and make it points to 1st element in the array
  in->pointerArr=in->pointerArr-in->numline;
  puts("The first element is : ");
  puts(*in->pointerArr);
  for(count=0;count<in->numline-1;count++){
    if(cap2==0 || strcmp(*in->pointerArr,*newArr)!=0){
      if(cap2!=0){
	newArr++;
      }
      printf("copy %s\n",*in->pointerArr);
      *newArr=malloc(sizeof(in->pointerArr));
      if(*newArr==NULL){
	puts("Fail");
	return 1;
      }
      strcpy(*newArr,*in->pointerArr);
      printf("After copy: copied %s, pointerArr is %s\n",*newArr,*in->pointerArr);
      cap2++;
    }
    in->pointerArr++;	  
    printf("Now is %s\n",*in->pointerArr);
  }
  //the last element in sorted array
  puts("Compare the last element");
  if(count==in->numline-1){
    in->pointerArr--;
    printf("Count is %d, numline is %d, Now *newArr is %s, *in->pinterArr is %s\n",count,in->numline,*newArr,*(in->pointerArr));
    if(strcmp(*in->pointerArr,*newArr)!=0){
      //not identical
      printf("copy %s\n",*in->pointerArr);
      *newArr=(char *)malloc(sizeof(*in->pointerArr));
      strcpy(*newArr,*in->pointerArr);
      cap2++;
    }
  }
  
  printf("End of Copy \nlast element in newArr: %s\n",*newArr);
  newArr=newArr-cap2+1;
  printf("1st element in newArr: %s\n",*(newArr));
  puts("content of new array");
  for(count=0;count<cap2;count++){
    printf("%s",*newArr);
    newArr++;
  }
  

}



