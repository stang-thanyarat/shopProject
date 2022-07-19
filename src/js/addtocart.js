

const submitElement = document.getElementById('mySubmit')
submitElement.addEventListener('click', (e) => {
  const targetElement = document.getElementById('solutionPay')
  console.log(targetElement.value)
  
  if (targetElement.value === 'cash') {
    e.target.setAttribute("data-bs-target", ".bd-example-modal-sm3")
  }
  else if (targetElement.value === 'bankTransfer') {
    e.target.setAttribute("data-bs-target", ".bd-example-modal-sm4")
  }
  else if (targetElement.value === 'installment') {
    e.target.setAttribute("data-bs-target", ".bd-example-modal-sm5")
  }
  // const price = document.getElementById('valuePrice')
  // price.value=210
})