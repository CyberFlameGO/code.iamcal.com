
import java.util.Vector;


public class MScResults {

	private Vector results;

	public MScResults(){
		results = new Vector();
	}

	private MScResult findResult(Integer id){

		for(int i=0; i<this.results.size(); i++){
			MScResult r = (MScResult)this.results.elementAt(i);
			if (r.id == id.intValue()){
				return r;
			}
		}

		MScResult r = new MScResult();
		this.results.add(r);
		r.id = id.intValue();

		return r;
	}

	public void setNames(Integer id, String name){
		MScResult r = this.findResult(id);
		r.name = name;
	}

	public void storeMark(Integer id, Float mark){
		MScResult r = this.findResult(id);
		r.mark = mark.floatValue();
	}

	public Float getMark(Integer id){
		MScResult r = this.findResult(id);
		return new Float(r.mark);
	}

	public Integer getNoOfStudents(Float lo, Float hi){

		int c = 0;

		for(int i=0; i<this.results.size(); i++){
			MScResult r = (MScResult)this.results.elementAt(i);
			if (r.mark > lo.floatValue() && r.mark < hi.floatValue()){
				c++;
			}
		}

		return new Integer(c);
	}

	public boolean displayLowestMark(){

		if (this.results.size() == 0){
			return false;
		}

		this.displayResultHeader();
		this.displayResult(this.getLowestMark());

		return true;
	}

	public boolean displayHighestMark(){

		if (this.results.size() == 0){
			return false;
		}

		this.displayResultHeader();
		this.displayResult(this.getHighestMark());

		return true;
	}

	public boolean displayResults(){

		if (this.results.size() == 0){
			return false;
		}

		this.displayResultHeader();

		for(int i=0; i<this.results.size(); i++){
			MScResult r = (MScResult)this.results.elementAt(i);
			this.displayResult(r);
		}

		return true;
	}

	private void displayResultHeader(){
		System.out.print(this.padStr("Student Name", 20));
		System.out.print(this.padStr("Percentage Mark", 20));
		System.out.print(this.padStr("Staus/GRADE", 10));
		System.out.println("");
	}

	private void displayResult(MScResult r){
		System.out.print(this.padStr(r.name, 20));
		System.out.print(this.padStr(new Float(r.mark).toString(), 20));
		System.out.print(this.padStr(r.getGrade(), 10));
		System.out.println("");
	}

	private MScResult getHighestMark(){

		MScResult out = (MScResult)this.results.elementAt(0);

		for(int i=1; i<this.results.size(); i++){
			MScResult r = (MScResult)this.results.elementAt(i);
			if (r.mark > out.mark){
				out = r;
			}
		}

		return out;
	}

	private MScResult getLowestMark(){

		MScResult out = (MScResult)this.results.elementAt(0);

		for(int i=1; i<this.results.size(); i++){
			MScResult r = (MScResult)this.results.elementAt(i);
			if (r.mark < out.mark){
				out = r;
			}
		}

		return out;
	}

	private String padStr(String s, int len){

		while(s.length() < len){
			s += ' ';
		}

		return s;
	}

}

class MScResult {
	public int id;
	public String name;
	public float mark;
	
	public String getGrade(){
		if (this.mark >= 69.5){
			return "Distinction";
		}
		if (this.mark >= 59.5){
			return "Merit";
		}
		return "Whatever";
	}
}
