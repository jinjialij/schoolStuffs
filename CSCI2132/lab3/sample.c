#include <stdio.h>
#define UNIX_ALL_OK 0
int main() {
  int status = UNIX_ALL_OK;
  int i;
  printf("I am about to start the loop\n");
for (i = 0; i < 15; ++i) {
    printf("*");
  }
  printf("I have finished the loop\n");
  printf("\n");
  return status;
}
