#include <stdio.h>
#include <stdlib.h>
//compare function
int cmpfunc(const void **a,const void **b){
  const char **i=(const char **)a;
  const char **j=(const char **)b;
  return strcmp(*(*i),*(*j));
}


int main(){
  char **p;
  char a[2]="bc";
  *p=a;
  *++p="de";
  *++p="k";
  *++p="t";
  *++p="n";
  *++p="a";
  int count=0;
  /*  for(count=0;count<6;count++){
    printf("%s\n",*(p-6+count));
    }*/
  puts(*(p-6));
  puts(a);
  /*
  size_t strlen=sizeof(p)/size(char *);
  qsort(*p,strlen,sizeof(char*),cmpfunc);
  for(count=0;count<6;count++){
    printf("%s\n",*(p-6+count));
    }*/
  

}
