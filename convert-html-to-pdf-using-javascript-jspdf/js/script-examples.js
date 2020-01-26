var doc = new jsPDF({
    orientation: 'landscape'
});

doc.text(20, 20, 'Hello world!');
doc.text(20, 30, 'This is client-side Javascript to generate a PDF.');

// Add new page
doc.addPage();
doc.text(20, 20, 'Visit CodexWorld.com');

// Font Sizes
doc.addPage();
doc.setFontSize(24);
doc.text(20, 20, 'This is a title');

doc.setFontSize(16);
doc.text(20, 30, 'This is some normal sized text underneath.');

// Text Fonts
doc.addPage();
doc.setFont("courier");
doc.setFontType("normal");
doc.text(20, 30, 'This is courier normal.');

doc.setFont("times");
doc.setFontType("italic");
doc.text(20, 40, 'This is times italic.');

doc.setFont("helvetica");
doc.setFontType("bold");
doc.text(20, 50, 'This is helvetica bold.');

doc.setFont("courier");
doc.setFontType("bolditalic");
doc.text(20, 60, 'This is courier bolditalic.');

// Text Colors
doc.addPage();

doc.setFont("courier");
doc.setFontType("helvetica");

doc.setTextColor(100);
doc.text(20, 20, 'This is gray.');

doc.setTextColor(150);
doc.text(20, 30, 'This is light gray.');

doc.setTextColor(255,0,0);
doc.text(20, 40, 'This is red.');

doc.setTextColor(0,255,0);
doc.text(20, 50, 'This is green.');

doc.setTextColor(0,0,255);
doc.text(20, 60, 'This is blue.');


// Save the PDF
doc.save('document.pdf');