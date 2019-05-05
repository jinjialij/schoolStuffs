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
  int len=-1;;
  int number=0;
  while(number != -1){ 
    number=getline(in->pointerArr, &size, stdin);
    len=strlen(*in->pointerArr);
    if(number!=-1){
      while(len==1){
	number=getline(in->pointerArr, &size, stdin);
	len=strlen(*in->pointerArr);
      } 
      count++;
      in->numline++;
      in->pointerArr++;
    }

    //realloc
    if(count>cap-1){
      cap=cap*2;
      in=realloc(in,cap*sizeof(struct inputText *));//realloc strcut
      if(in->pointerArr==NULL){
        puts("Fail to realloc");
        return 1;
      }

      in->pointerArr=(char**)realloc(in,cap*sizeof(char *));//realloc the array of pointers to size of double cap
      if(in->pointerArr==NULL){
	puts("Fail to realloc");
	return 1;
      }
      in->pointerArr=in->pointerArr+count-1;      
    }

  }

  //compare each line
  
  //sort    
  qsort((in->pointerArr-in->numline),in->numline,sizeof(char*),cmpfunc);
  //delete duplicate
  //create a new arry of pointers
  char **newArr;
  newArr=malloc(cap*sizeof(char *));
  if(newArr== NULL){
    puts("Fail");
    return 1;
  }
    
  int cap2=0;
  //go over the in->pointerArr and make it points to 1st element in the array
  in->pointerArr=in->pointerArr-in->numline;    
  for(count=0;count<in->numline;count++){
    if(cap2==0 || strcmp(*in->pointerArr,*newArr)!=0){
      if(cap2!=0){
	newArr++;
      }
      *newArr=malloc(sizeof(in->pointerArr));
      if(*newArr==NULL){
	puts("Fail");
	return 1;
      }
	strcpy(*newArr,*in->pointerArr);//copy elements
	cap2++;
    }
    in->pointerArr++;	      
  }
  
  if(count==in->numline-1){
      in->pointerArr--;
      if(strcmp(*in->pointerArr,*newArr)!=0){//not identical
	*newArr=(char *)malloc(sizeof(*in->pointerArr));
	strcpy(*newArr,*in->pointerArr);
	cap2++;
      }
    }
  
  newArr=newArr-cap2+1;
  puts("output");
  for(count=0;count<cap2;count++){
      printf("%s",*newArr);
      newArr++;
  }
  for(count=0;count<in->numline;count++){
    free(*(in->pointerArr-in->numline+count));
  }
  for(count=0;count<cap2;count++){
    free(*(newArr-cap2+count));
  }
  free(in);
  return 0;
}



