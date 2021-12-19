import org.apache.pdfbox.pdfparser.PDFParser;
import org.apache.pdfbox.io.RandomAccessBuffer;
import org.apache.pdfbox.io.RandomAccessFile;
import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.cos.COSDocument;
import org.apache.pdfbox.text.PDFTextStripper;


import java.io.*;


public class PdfConvert {
    public static void main(String args[]) {
        File pdf_file = new File("/Users/cheolhwilee/PhpstormProjects/phprun/resource/test.pdf");
        PDDocument document = null;
        try {
            document = PDDocument.load(pdf_file);//load pdf_file
            int pages = document.getNumberOfPages();//get Number Of Pages
            PDFTextStripper stripper = new PDFTextStripper();//read the content
            stripper.setSortByPosition(true);
            stripper.setStartPage(1);
            stripper.setEndPage(pages);
            String content = stripper.getText(document);//get the content to the buffer
            //write the content
            PrintWriter pw = new PrintWriter("/Users/cheolhwilee/PhpstormProjects/phprun/resource/test.txt");
            pw.print(content);
            pw.close();
        } catch (Exception e) {
            System.out.println(e);
        }
    }
}