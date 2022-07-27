
const targetElement = document.getElementById('solutionPay')
const submitElement = document.getElementById('mySubmit')
targetElement.addEventListener('change', (e) => {
  if (e.target.value === 'cash') {
    submitElement.setAttribute("data-bs-target", ".bd-example-modal-sm3")
  }
  else if (e.target.value === 'bankTransfer') {
    submitElement.setAttribute("data-bs-target", ".bd-example-modal-sm4")
  }
  else if (e.target.value === 'installment') {
    submitElement.setAttribute("data-bs-target", ".bd-example-modal-sm5")
  }
})

