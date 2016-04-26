# include <iostream>

using namespace std;

int main(){
	cout << 100 % 'A' << endl; 
	int a    = 3533;
	int b    = 6597;
	int ans  = 8;
	int temp = 1;
	for (int i = 0; i < a; i++) {
	   temp *= ans;
	   temp %= 11413;
	} 
	cout << temp << endl;
	char s = temp;
	cout << s << endl;
	cout << (int)s << endl;
	ans  = temp;
	temp = 1;
	for (int i = 0; i < b; i++) {
	   temp *= ans;
	   temp %= 11413;
	} 
	cout << temp << endl;
	return 0;
}

