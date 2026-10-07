        const botao = document.getElementById("btnDownload");

        botao.addEventListener("click", function() {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF();
            pdf.text("tabelaProdutos",14, 15);
            pdf.autoTable({
                html: "#tabelaProdutos",
                startY: 25
            });
            pdf.save("historico-de-uso.pdf");
        });