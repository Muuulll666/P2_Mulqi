@extends('layouts.form')

@section('title', 'Form Lamaran Kerja')

@section('form')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <h2>Form Lamaran Kerja</h2>
                </div>
                <div class="col-sm-6 col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="iconly-Home icli svg-color"></i></a></li>
                        <li class="breadcrumb-item">Form Controls</li>
                        <li class="breadcrumb-item active">Form Lamaran Kerja</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <!-- Form Input Panel -->
            <div class="col-xl-6 mb-lg-3">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <h3>Form Lamaran</h3>
                        <p class="mt-1 mb-0">Isi form berikut untuk membuat surat lamaran kerja</p>
                    </div>
                    <div class="card-body custom-input form-validation">
                        <form id="letterForm" class="row g-3">
                            <div class="col-12">
                                <label for="inputKota" class="form-label">1. Kota</label>
                                <input type="text" id="inputKota" class="form-control form-step" data-step="1" placeholder="Contoh: Jakarta" required>
                            </div>
                            
                            <div class="col-12">
                                <label for="inputTanggal" class="form-label">2. Tanggal</label>
                                <input type="date" id="inputTanggal" class="form-control form-step" data-step="2" required>
                            </div>
                            
                            <div class="col-12">
                                <label for="inputSubjek" class="form-label">3. Subjek Surat</label>
                                <input type="text" id="inputSubjek" class="form-control form-step" data-step="3" placeholder="Contoh: Lamaran Pekerjaan - Posisi Marketing" required>
                            </div>
                            
                            <div class="col-12">
                                <label for="inputAlamatPenerima" class="form-label">4. Alamat Penerima</label>
                                <textarea id="inputAlamatPenerima" class="form-control form-step" data-step="4" rows="4" placeholder="Kepada:
HRD Manager
Nama Perusahaan
Jl. Alamat Perusahaan No. 123" required></textarea>
                            </div>
                            
                            <div class="col-12">
                                <label for="inputPembuka" class="form-label">5. Paragraf Pembuka</label>
                                <textarea id="inputPembuka" class="form-control form-step" data-step="5" rows="4" placeholder="Dengan hormat,
Melalui surat ini, saya ingin..." required></textarea>
                            </div>
                            
                            <div class="col-12">
                                <label for="inputIsi" class="form-label">6. Paragraf Isi (Opsional)</label>
                                <textarea id="inputIsi" class="form-control form-step" data-step="6" rows="4" placeholder="Saya memiliki pengalaman dalam..."></textarea>
                            </div>
                            
                            <div class="col-12">
                                <label for="inputPenutup" class="form-label">7. Paragraf Penutup</label>
                                <textarea id="inputPenutup" class="form-control form-step" data-step="7" rows="4" placeholder="Demikian surat lamaran ini saya buat..." required></textarea>
                            </div>
                            
                            <div class="col-12">
                                <label for="inputPengirim" class="form-label">8. Nama Pengirim</label>
                                <input type="text" id="inputPengirim" class="form-control form-step" data-step="8" placeholder="Nama Lengkap Anda" required>
                            </div>
                            
                            <div class="col-12 mt-4">
                                <div class="d-flex gap-2">
                                    <button type="button" id="btnClear" class="btn btn-secondary">
                                        <i class="iconly-Delete icli"></i> Clear Form
                                    </button>
                                    <button type="button" id="btnDone" class="btn btn-primary" disabled>
                                        <i class="iconly-Check icli"></i> Generate Surat
                                    </button>
                                    <button type="button" id="btnPrint" class="btn btn-success" disabled>
                                        <i class="iconly-Printer icli"></i> Cetak Surat
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Preview Panel -->
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-header card-no-border pb-0">
                        <h3>Preview Surat</h3>
                        <p class="mt-1 mb-0">Preview surat akan muncul secara real-time</p>
                    </div>
                    <div class="card-body p-0">
                        <div class="preview-panel">
                            <div class="a4-paper" id="printArea">
                                <!-- Header Surat -->
                                <div class="letter-header">
                                    <h1>Surat Lamaran Kerja</h1>
                                </div>

                                <!-- Alamat Pengirim (Kota dari input) -->
                                <div class="sender-address">
                                    <span id="prevKota"><span class="empty-placeholder">[Kota]</span></span>, 
                                    <span id="prevTanggal"><span class="empty-placeholder">[Tanggal]</span></span>
                                </div>

                                <!-- Subjek Surat -->
                                <div class="letter-subject">
                                    <strong>Hal: </strong><span id="prevSubjek"><span class="empty-placeholder">[Subjek Surat]</span></span>
                                </div>

                                <!-- Alamat Penerima -->
                                <div class="recipient-address">
                                    <div id="prevAlamatPenerima">
                                        <span class="empty-placeholder">Kepada:<br>HRD Manager<br>Nama Perusahaan<br>Jl. Alamat Perusahaan No. 123</span>
                                    </div>
                                </div>

                                <!-- Salam Pembuka -->
                                <div class="salutation">
                                    <span id="prevPembuka">
                                        <span class="empty-placeholder">Kepada Yth.<br>Dengan hormat,<br><br>Melalui surat ini, saya ingin...</span>
                                    </span>
                                </div>

                                <!-- Isi Surat -->
                                <div class="letter-body">
                                    <!-- Paragraf Isi -->
                                    <div class="paragraph" id="prevIsi">
                                        <span class="empty-placeholder">[Paragraf isi surat akan muncul di sini]</span>
                                    </div>

                                    <!-- Paragraf Penutup -->
                                    <div class="paragraph" id="prevPenutup">
                                        <span class="empty-placeholder">[Paragraf penutup surat akan muncul di sini]</span>
                                    </div>
                                </div>

                                <!-- Salam Penutup -->
                                <div class="signature">
                                    Hormat saya,
                                </div>

                                <!-- Tanda Tangan -->
                                <div class="signature">
                                    <div id="prevPengirim">
                                        <span class="empty-placeholder">[Nama Pengirim]</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="toast">
    <div class="d-flex align-items-center">
        <i class="iconly-Check icli text-white me-2"></i>
        <span>Surat Lamaran Berhasil Digenerate!</span>
    </div>
</div>

<style>
    /* CSS untuk Preview Surat */
    .preview-panel {
        background-color: #525659;
        padding: 20px;
        display: flex;
        justify-content: center;
        overflow-y: auto;
        min-height: 600px;
    }

    .a4-paper {
        background: white;
        width: 210mm;
        min-height: 297mm;
        padding: 25mm;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        font-family: 'Times New Roman', Times, serif;
        color: black;
        line-height: 1.5;
    }

    .letter-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .letter-header h1 {
        font-size: 16pt;
        font-weight: bold;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
        text-decoration: underline;
    }

    .sender-address {
        text-align: right;
        margin-bottom: 2rem;
        font-size: 11pt;
    }

    .letter-subject {
        margin-bottom: 2rem;
        font-size: 11pt;
    }

    .recipient-address {
        margin-bottom: 2rem;
        font-size: 11pt;
    }

    .salutation {
        margin-bottom: 1rem;
        font-size: 11pt;
    }

    .letter-body {
        font-size: 11pt;
        text-align: justify;
        margin-bottom: 2rem;
    }

    .paragraph {
        margin-bottom: 1rem;
        text-indent: 1.5rem;
    }

    .closing {
        margin-top: 2rem;
        margin-bottom: 3rem;
    }

    .signature {
        text-align: right;
        margin-top: 4rem;
    }

    .signature-name {
        font-weight: bold;
        margin-top: 3rem;
    }

    .empty-placeholder {
        color: #ccc;
        font-style: italic;
    }

    /* Toast Notification */
    .toast {
        position: fixed;
        top: 20px;
        right: 20px;
        background: #10b981;
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 0.5rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        transform: translateY(-100px);
        transition: transform 0.3s ease-out;
        z-index: 100;
        display: none;
    }

    .toast.show {
        display: block;
        transform: translateY(0);
    }

    /* Responsive */
    @media print {
        body * {
            visibility: hidden;
        }
        #printArea, #printArea * {
            visibility: visible;
        }
        #printArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            box-shadow: none;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Mengambil semua elemen form langkah demi langkah
        const formSteps = document.querySelectorAll('.form-step');
        
        // 2. Mapping ID Input ke ID Preview untuk update otomatis
        const bindings = [
            { input: 'inputKota', preview: 'prevKota' },
            { input: 'inputTanggal', preview: 'prevTanggal' },
            { input: 'inputSubjek', preview: 'prevSubjek' },
            { input: 'inputAlamatPenerima', preview: 'prevAlamatPenerima' },
            { input: 'inputPembuka', preview: 'prevPembuka' },
            { input: 'inputIsi', preview: 'prevIsi' },
            { input: 'inputPenutup', preview: 'prevPenutup' },
            { input: 'inputPengirim', preview: 'prevPengirim' }
        ];

        // 3. Element penting
        const btnDone = document.getElementById('btnDone');
        const btnClear = document.getElementById('btnClear');
        const btnPrint = document.getElementById('btnPrint');
        const toast = document.getElementById('toast');

        // --- LOGIKA 1: VALIDASI BERURUTAN (SEQUENTIAL) ---
        
        function checkFormValidity() {
            let allValid = true;
            
            // Kita loop mulai dari langkah ke-0
            for (let i = 0; i < formSteps.length; i++) {
                const currentStep = formSteps[i];
                const nextStep = formSteps[i + 1];

                // Cek apakah input saat ini memiliki nilai
                let isValid = false;
                
                if (currentStep.type === 'date') {
                    // Khusus tanggal
                    isValid = currentStep.value !== '';
                } else if (currentStep.tagName === 'TEXTAREA') {
                    // Textarea: wajib untuk pembuka, penutup, dan alamat penerima
                    const requiredTextareas = ['inputPembuka', 'inputPenutup', 'inputAlamatPenerima'];
                    if (requiredTextareas.includes(currentStep.id)) {
                        isValid = currentStep.value.trim() !== '';
                    } else {
                        // Untuk textarea opsional (isi), selalu valid
                        isValid = true;
                    }
                } else {
                    // Text input
                    isValid = currentStep.value.trim() !== '';
                }

                // Logika sequential: hanya enable next step jika current step valid
                if (nextStep) {
                    if (isValid) {
                        nextStep.disabled = false;
                    } else {
                        nextStep.disabled = true;
                        nextStep.classList.add('is-invalid');
                    }
                }

                // Track jika semua field required valid
                if (!isValid && currentStep.required) {
                    allValid = false;
                }
            }

            // Enable/Disable tombol berdasarkan validasi semua field
            btnDone.disabled = !allValid;
            btnPrint.disabled = !allValid;
            
            return allValid;
        }

        // Format tanggal untuk tampilan
        function formatDate(dateString) {
            if (!dateString) return '';
            const date = new Date(dateString);
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }

        // --- LOGIKA 2: UPDATE PREVIEW REAL-TIME ---
        function updatePreview() {
            bindings.forEach(bind => {
                const inputEl = document.getElementById(bind.input);
                const prevEl = document.getElementById(bind.preview);
                
                if (inputEl && prevEl) {
                    // Format khusus untuk tanggal
                    if (bind.input === 'inputTanggal') {
                        if (inputEl.value === '') {
                            prevEl.innerHTML = '<span class="empty-placeholder">[Tanggal]</span>';
                        } else {
                            prevEl.textContent = formatDate(inputEl.value);
                        }
                    } 
                    // Format khusus untuk textarea (simpan line breaks)
                    else if (inputEl.tagName === 'TEXTAREA') {
                        if (inputEl.value.trim() === '') {
                            prevEl.innerHTML = '<span class="empty-placeholder">' + 
                                (bind.input === 'inputPembuka' ? 
                                    'Kepada Yth.<br>Dengan hormat,<br><br>Melalui surat ini, saya ingin...' : 
                                    bind.input === 'inputAlamatPenerima' ?
                                        'Kepada:<br>HRD Manager<br>Nama Perusahaan<br>Jl. Alamat Perusahaan No. 123' :
                                        '[Paragraf surat akan muncul di sini]') + 
                                '</span>';
                        } else {
                            // Ganti newline dengan <br> untuk tampilan HTML
                            prevEl.innerHTML = inputEl.value.replace(/\n/g, '<br>');
                        }
                    }
                    else {
                        // Input text biasa
                        if (inputEl.value.trim() === '') {
                            prevEl.innerHTML = '<span class="empty-placeholder">[' + 
                                (bind.input === 'inputKota' ? 'Kota' : 
                                 bind.input === 'inputSubjek' ? 'Subjek Surat' : 
                                 bind.input === 'inputPengirim' ? 'Nama Pengirim' : 'Data') + 
                                ']</span>';
                        } else {
                            prevEl.textContent = inputEl.value;
                        }
                    }
                }
            });
        }

        // --- LOGIKA 3: TOMBOL CLEAR FORM ---
        btnClear.addEventListener('click', () => {
            if (confirm('Apakah Anda yakin ingin menghapus semua data form?')) {
                // Reset semua input
                formSteps.forEach(step => {
                    if (step.tagName !== 'BUTTON') {
                        step.value = '';
                        step.disabled = true;
                    }
                });
                
                // Enable hanya step pertama
                document.querySelector('.form-step[data-step="1"]').disabled = false;
                
                // Reset preview
                updatePreview();
                
                // Reset tombol
                btnDone.disabled = true;
                btnPrint.disabled = true;
                
                // Tampilkan pesan
                showToast('Form berhasil direset', 'info');
            }
        });

        // --- LOGIKA 4: TOMBOL GENERATE SURAT ---
        btnDone.addEventListener('click', () => {
            if (checkFormValidity()) {
                showToast('Surat lamaran berhasil digenerate!', 'success');
                // Scroll ke preview
                document.querySelector('.preview-panel').scrollIntoView({ behavior: 'smooth' });
            }
        });

        // --- LOGIKA 5: TOMBOL CETAK SURAT ---
        btnPrint.addEventListener('click', () => {
            if (checkFormValidity()) {
                // Clone element untuk print
                const printContent = document.getElementById('printArea').cloneNode(true);
                
                // Buat iframe untuk print
                const printWindow = window.open('', '_blank');
                printWindow.document.write(`
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Surat Lamaran Kerja</title>
                        <style>
                            body { 
                                font-family: 'Times New Roman', Times, serif; 
                                margin: 0; 
                                padding: 20mm; 
                                line-height: 1.5;
                            }
                            .letter-header { text-align: center; margin-bottom: 2rem; }
                            .letter-header h1 { 
                                font-size: 16pt; 
                                font-weight: bold; 
                                text-transform: uppercase; 
                                text-decoration: underline;
                                margin-bottom: 1.5rem;
                            }
                            .sender-address { text-align: right; margin-bottom: 2rem; font-size: 11pt; }
                            .letter-subject { margin-bottom: 2rem; font-size: 11pt; }
                            .recipient-address { margin-bottom: 2rem; font-size: 11pt; }
                            .salutation { margin-bottom: 1rem; font-size: 11pt; }
                            .letter-body { font-size: 11pt; text-align: justify; margin-bottom: 2rem; }
                            .paragraph { margin-bottom: 1rem; text-indent: 1.5rem; }
                            .closing { margin-top: 2rem; margin-bottom: 3rem; }
                            .signature { text-align: right; margin-top: 4rem; }
                            @media print {
                                body { padding: 0; margin: 0; }
                                @page { margin: 20mm; }
                            }
                        </style>
                    </head>
                    <body>
                        ${printContent.innerHTML}
                    </body>
                    </html>
                `);
                printWindow.document.close();
                
                // Print setelah konten dimuat
                printWindow.onload = function() {
                    printWindow.focus();
                    printWindow.print();
                    printWindow.close();
                };
                
                showToast('Mempersiapkan cetakan surat...', 'info');
            }
        });

        // --- FUNGSI TAMBAHAN ---
        function showToast(message, type = 'success') {
            const colors = {
                success: '#10b981',
                info: '#3b82f6',
                error: '#ef4444'
            };
            
            toast.style.backgroundColor = colors[type] || colors.success;
            toast.querySelector('span').textContent = message;
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        // Tambahkan event listener ke setiap input form
        formSteps.forEach((step, index) => {
            // Saat user mengetik (input) atau memilih (change)
            step.addEventListener('input', () => {
                checkFormValidity();
                updatePreview();
            });

            step.addEventListener('change', () => {
                checkFormValidity();
                updatePreview();
            });
        });

        // Set tanggal default ke hari ini
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('inputTanggal').value = today;
        
        // Jalankan validasi awal saat halaman dimuat
        document.querySelector('.form-step[data-step="1"]').disabled = false;
        checkFormValidity();
        updatePreview();
    });
</script>
@endsection