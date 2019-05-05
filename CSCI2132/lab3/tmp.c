#include <stdio.h>
#define UNIX_ALL_OK 0
int main() {
  int status = UNIX_ALL_OK;
  int i;
  for (i = 0; i < 10; ++i) {
    printf("*");
  }
  printf("\n");
  return status;
}
