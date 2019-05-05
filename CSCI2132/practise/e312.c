#include <stdio.h>
#define RECIPROCAL_OF_PI 1.0 / 3.14159
int main(){
  
  int a=5,j=3;
  printf("%d/%d=%d\n%d %% %d=%d\n",a,j,a/j,a,j,a%j);
  
  double i=RECIPROCAL_OF_PI;
  double pi = 1.0 / RECIPROCAL_OF_PI;
  printf("RECIPROCAL_OF_PI is %lf\n",i);
  printf("pi is : %lf\n",pi);


}
