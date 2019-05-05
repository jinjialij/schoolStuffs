#include <stdio.h>
#include <math.h>

int main(){
  long long unsigned input,b,s;

  printf("Enter a number: ");
  scanf("%d",&input);
  if ( input >1){
    s=2*sqrt(input);
    for ( b=2;b<s;b++  ){
      if ( input%b ==0 ){
	printf("%d is not a prime number.\n",input);
	return 0;
      }
    }
    printf("%d is a prime number.\n",input);
    return 0;
  }
  else{
    printf("%d is not a prime number.\n",input);
    return 0;
  }

}
