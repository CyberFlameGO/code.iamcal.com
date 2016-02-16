
public class MScResultsTest {

	public static void main(String[] args) throws Exception {

		MScResults results = new MScResults();

		///////////////////////

		MScResultsTest.testHeader("testing MScResults.setNames()");

		results.setNames(new Integer(1), "Bob");
		results.setNames(new Integer(2), "Jack");
		results.setNames(new Integer(3), "Jill");

		///////////////////////

		MScResultsTest.testHeader("testing MScResults.storeMark()");

		results.storeMark(new Integer(1), new Float(50));
		results.storeMark(new Integer(2), new Float(70));
		results.storeMark(new Integer(3), new Float(22.4));

		///////////////////////

		MScResultsTest.testHeader("testing MScResults.displayResults()");

		results.displayResults();

		///////////////////////

		MScResultsTest.testHeader("testing MScResults.getNoOfStudents()");

		Integer i = results.getNoOfStudents(new Float(40), new Float(80));
		MScResultsTest.testOk(i.intValue() == 2);

	}

	public static void testHeader(String s){

		System.out.println("");
		System.out.println("-----------------------------------------------------------");
		System.out.println("--");
		System.out.println("-- "+s);
		System.out.println("--");
		System.out.println("");
	}

	public static void testOk(boolean b){
		if (b){
			System.out.println("ok");
		}else{
			System.out.println("fail");
		}
	}

}
