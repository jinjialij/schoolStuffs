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
  int cap=10,count=0;
  struct inputText *in=malloc(sizeof(struct inputText)*cap);
  in->numline=0;
  in->pointerArr=malloc(sizeof(char *)*cap);//mallocat for pointerArr, an array contains 10 pointers

  size_t size=0;
  int len=-1;;
  int number=0;
  while(number != -1){ 
    number=getline(in->pointerArr, &size, stdin);
    len=strlen(*in->pointerArr);
    //printf("The length of stdin is %d\n",len);
    if(number!=-1){
    while(len==1){
      number=getline(in->pointerArr, &size, stdin);
      len=strlen(*in->pointerArr);
      //printf("The length of stdin is %d,count is %d\n",len,count);
    }
    printf("Add %dth element in in->pointerArr: %s\n",count,*in->pointerArr);
      count++;
      in->numline++;
      in->pointerArr++;
    }
    //realloc
    if(count>cap-1){
      cap=cap*2;
      struct inputText *in2=(struct inputText *)malloc(cap*sizeof(struct inputText *));//realloc strcut
      if(in2==NULL){
        puts("Fail to malloc");
        return 1;
      }
      else{
        printf("Success to allocat");
      }

      in2->pointerArr=(char**)malloc(cap*sizeof(char *));//realloc the array of pointers to size of double cap
      if(in2->pointerArr==NULL){
	puts("Fail to realloc");
	return 1;
      }
      else{
	printf("Success to realloc,cap is %d\n",cap);
      }
      //copy elements of contents in in->pointerArr to in2
      in2->numline=count;
      for(count=0;count<=in->numline;count++){
	*in2->pointerArr=(char*)malloc(sizeof(*(in->pointerArr-in->numline+count)));
	strcpy(*(in->pointerArr-in->numline+count),*in2->pointerArr);
      }
      free(in->pointerArr);
      free(in);
      struct inputText *in=(struct inputText *)maclloc(cap*sizeof(struct inputText *));
      in->pointerArr=(char **)malloc(sizeof(in2->pointerArr));
      in->numline=in2->numline;
      for(count=0;count<=in2->numline;count++){
	*in->pointerArr=*in2->pointerArr;
      }
      puts("now print new in2 arr");
      for(count=0;count<=in2->numline;count++){
	printf("the %d th element:\n",count);
	printf("%s",*(in2->pointerArr-in2->numline+count));
      }
      puts("now print new arr in");
      for(count=0;count<=in->numline;count++){
        printf("the %d th element:\n",count);
        printf("%s",*(in->pointerArr-in->numline+count));
      }
      free(in2->pointerArr);
      free(in2);
      //in->pointerArr=in->pointerArr+count;//+in->numline;
      printf("Now count is : %d, element is :%s \n ",count,*in->pointerArr);
      //printf("%s\n",*(in->pointerArr+1));
      //in->pointerArr=in->pointerArr+in->numline+1;//realloc the pointer in the struct
    }

  }

  //compare each line
  if(cap<=10){
    //print 
    printf("if cap: %d <= 10\n",cap);
    printf("1st element is : %s",*(in->pointerArr-count));
    printf("last element is : %s",*(in->pointerArr-1));
    printf("\nresult: \n");
    puts("before sort");
    for(count=0;count<in->numline;count++){
      printf("the %d th element:\n",count);
      printf("%s",*(in->pointerArr-in->numline+count));
    }
    //print
    
    qsort((in->pointerArr-in->numline),in->numline,sizeof(char*),cmpfunc);
    
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
    
    int cap2=0;
    //go over the in->pointerArr and make it points to 1st element in the array
    in->pointerArr=in->pointerArr-in->numline;
   
    printf("The first element is : %s\n",*in->pointerArr);
        
    for(count=0;count<in->numline;count++){
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
     
      if(strcmp(*in->pointerArr,*newArr)!=0){//not identical
	printf("copy %s\n",*in->pointerArr);
	*newArr=(char *)malloc(sizeof(*in->pointerArr));
	strcpy(*newArr,*in->pointerArr);
	cap2++;
      }
    }
   
    //print
    printf("End of Copy \nlast element in newArr: %s\n",*newArr);
    newArr=newArr-cap2+1;
    printf("1st element in newArr: %s\n",*(newArr));
    puts("content of new array");
    for(count=0;count<cap2;count++){
      printf("%s",*newArr);
      newArr++;
    }
    //print
    free(in->pointerArr);
    free(in);
    return 0;
  }
  else{
    printf("%d, count = %d,cap =%d\n",in->numline,count,cap);
    printf("if cap: %d <= 10\n",cap);
    printf("arr+numline th element is : %s\n",*(in->pointerArr+in->numline));
    //last element is arr-1
    printf("last %dth element is : %s\n",count+1,*(in->pointerArr-1));
    printf("1st element is : %s\n",*(in->pointerArr-in->numline+1));

    printf("%dth element is : -2: %s\n  +2: %s\n",count,*(in->pointerArr-2),*(in->pointerArr+2));
    printf("%dth element is : -3: %s\n  +3: %s\n",count-1,*(in->pointerArr-3),*(in->pointerArr+3));
    printf("%dth element is : %s\n",count-2,*(in->pointerArr-4));
    printf("%dth element is : %s\n",count-3,*(in->pointerArr-5));
    printf("%dth element is : %s\n",count-4,*(in->pointerArr-6));
    printf("%dth element is : %s\n",count-5,*(in->pointerArr-7));
    printf("%dth element is : %s\n",count-6,*(in->pointerArr-8));
    printf("%dth element is : %s\n",count-7,*(in->pointerArr-9));
    printf("%dth element is : %s\n",count-8,*(in->pointerArr-10));

    printf("%dth element is : %s\n",count-9,*(in->pointerArr-11));
    printf("%dth element is : %s\n",count-10,*(in->pointerArr-12));
    printf("%dth element is : %s\n",count-11,*(in->pointerArr-13));



  }
}



