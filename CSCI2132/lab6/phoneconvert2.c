#include <stdio.h>

int main() {
  int a,b,c;
  
  printf("Enter a telephone number [(xxx)xxx-xxxx]: ");
  scanf("(%3d)%3d-%3d",&a,&b,&c);

    printf("The number is %d,%d,%d\n",a,b,c);

  return 0;
}
