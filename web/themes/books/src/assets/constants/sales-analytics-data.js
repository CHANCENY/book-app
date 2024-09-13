let SALES_ANALYTICS_DATA = [
  {
    itemClass: "online",
    icon: "shopping_cart",
    title: "ONLINE ORDERS",
    colorClass: "success",
    percentage: "+39",
    sales: "3849",
  },
  {
    itemClass: "offline",
    icon: "local_mall",
    title: "OFFLINE ORDERS",
    colorClass: "danger",
    percentage: "-17",
    sales: "1100",
  },
  {
    itemClass: "customers",
    icon: "person",
    title: "NEW CUSTOMERS",
    colorClass: "danger",
    percentage: "+25",
    sales: "849",
  },
];


const xhrrA = new XMLHttpRequest();
xhrrA.open('GET', '/dashboard/endpoints/query/live_books',false);
xhrrA.onload = function () {
  if(this.status === 200) {
    try{
      SALES_ANALYTICS_DATA = JSON.parse(this.responseText)
    }catch (e) {
      SALES_ANALYTICS_DATA = [];
    }
  }
}
xhrrA.send();