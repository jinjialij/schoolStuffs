#include <stdio.h>

int main() {

  int n=9;
  int binaryNum[1000]; 
  
  // counter for binary array 
  int i = 0,j=0; 
  while (n > 0) { 
  
    // storing remainder in binary array 
    binaryNum[i] = n % 2; 
    n = n / 2; 
    i++; 
  } 
  
  int result=0;
  // printing binary array in reverse order 
  for (j = i - 1; j >= 0; j--) 
    printf("%d",binaryNum[j]); 

}
