#include <stdio.h>


long long iqrt(long long num) {
  long long res = 0;
  long long unsigned bit = 1UL << 63; 
  // The maximum of 64 bit unsigned integer is from 0 to 2^63-1;1<<64=1*2^64 
  // "bit" starts at the highest power of four <= the argument.
  printf("\nbit is %d\nbit >>2 = %d>>2 =%d",bit,bit,bit>>2);
  while (bit > num)
    bit >>= 2;//bit=bit/2^2
  printf("bis is %d\nstart of the loop\n\n",bit);
  while (bit != 0) {
    printf("\nIn the while loop: \n",num);
    if (num >= res + bit) {
      printf("num =num-(res+bit)\n=%d-(%d+%d)\n\n",num,res,bit);
      num =num- (res + bit);
      
      printf("res=(res>>1)+bit=(%d>>1)+%d=%d\n",res,bit,(res>>1)+bit);
      res = (res >> 1) + bit;//res/2
      printf("\nres is %d\n",res);
    }
    else{
      printf("res =res>>1= %d>>1=%d\n",res,res>>1);
      res >>= 1;
    }
    printf("\nbit >> 2 = %d>>2=%d\n",bit,bit>>2);
    bit >>= 2;//bit=bit/2^2
    
  }
  printf("\n\nEnd of loop\n",num);
  return res;
}

int main(){
  long long unsigned input,b;

  printf("Enter a number: ");
  scanf("%d",&input);
  if ( input >1){
    for ( b=2;b<(2*iqrt(input));b++  ){
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
