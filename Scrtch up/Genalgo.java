import java.util.Random;
class Genalgo{

	public String numGeneration(){

		Genalgo obj1=new Genalgo();
		int d1,d2,d3,d4,d5,d6,d7,d8;
		int[] arr=new int[8];
		Random random=new Random();
		d1=random.nextInt(9)+1;
		arr[0]=d1;

		if (d1>=5) {
			d2=random.nextInt(5);
		}
		else{
			d2=random.nextInt(7)+3;
		}
		arr[1]=d2;

		if (d2>d1) {
			d3=random.nextInt(8)+2;
			
		}
		else{
			d3=random.nextInt(9);
		}
		arr[2]=d3;

		if (d1>0 && d2<8 && d3>4) {
			d4=random.nextInt(5)+3;
		}
		else if(d1>0 && d2<8 && d3<4){
			d4=random.nextInt(7)+2;
		}
		else if(d1>1 && d2<=4 && d3<7){
			d4=random.nextInt(4)+1;
		}
		else{
			d4=random.nextInt(10);
		}
		arr[3]=d4;

		if (obj1.isPrime(d1) || obj1.isPrime(d2)) {
			d5=random.nextInt(7);
		}
		else if(obj1.isPrime(d4) && d2>d1){
			d5=random.nextInt(5)+3;
		}
		else if(obj1.isPrime(d3) && d1<3){
			d5=random.nextInt(4)+5;
		}
		else{
			d5=random.nextInt(10);
		}

		arr[4]=d5;

		if (obj1.isPrime(d5)) {
			d6=random.nextInt(5)+3;
		}
		else if(d4>=3 && d2<=7){
			d6=random.nextInt(5)+4;
		}
		else if(d1>5 && d2<=2 && d3<5){
			d6=random.nextInt(6)+1;
		}
		else{
			d6=random.nextInt(10);
		}

		arr[5]=d6;

		if (d1>6) {
			d7=random.nextInt(5);
		}
		else if(d1<3){
			d7=random.nextInt(5)+3;
		}
		else if(d6>4){
			d7=random.nextInt(7)+2;
		}
		else{
			d7=random.nextInt(5)+5;
		}

		arr[6]=d7;

		if (obj1.isPrime(d7)) {
			d8=random.nextInt(7)+2;
		}
		else if(d6>=5){
			d8=random.nextInt(5)+3;
		}
		else if(isPrime(d5)){
			d8=random.nextInt(3)+7;
		}
		else{
			d8=random.nextInt(10);
		}

		arr[7]=d8;

		int composedNumber = 0;
	    for (int digit : arr) {
	        composedNumber = composedNumber * 10 + digit;
	    }

	    String composedNumberString = String.valueOf(composedNumber);

    	return composedNumberString;

	}
	public boolean isPrime(int n) {
        if (n <= 1) {
            return false; 
        }
        for (int i = 2; i <= Math.sqrt(n); i++) {
            if (n % i == 0) {
                return false; 
            }
        }
        return true; 
    }



}