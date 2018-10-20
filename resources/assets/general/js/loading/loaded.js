var xml_type;
let elementLoading = false;
let countElementLoading = 0;

let pageLoading = function()
{
    if(elementLoading)
    {
        countElementLoading +=1;
        var options = {
            theme:"sk-bounce",
            backgroundColor:"#c8e8f5",
            element : elementLoading
        };
        HoldOn.open(options);
    }
}

let pageLoaded = function()
{
    if(elementLoading)
    {
      countElementLoading -=1;
      if(countElementLoading == 0)
      {
          HoldOn.close()
          elementLoading = false;
          countElementLoading = 0;
      }
    }
}
// branch for native XMLHttpRequest object
if(window.XMLHttpRequest && !(window.ActiveXObject)) {
   xml_type = 'XMLHttpRequest';
// branch for IE/Windows ActiveX version
} else if(window.ActiveXObject) {
    try {
        
        a = new ActiveXObject('Msxml2.XMLHTTP');
        
        xml_type = 'Msxml2.XMLHTTP';
    } catch(e) {
        a = new ActiveXObject('Microsoft.XMLHTTP');
        xml_type = 'Microsoft.XMLHTTP';
        
    }
    
}
var ActualActiveXObject = window.ActiveXObject;
var ActiveXObject;
if (xml_type == 'XMLHttpRequest') {
    
    (function(open,getAllResponseHeaders) {
      XMLHttpRequest.prototype.open = function(method, url, async, user, pass) {
        if (typeof pageLoading === "function")
        	pageLoading();
        open.call(this, method, url, async, user, pass);
      };

      XMLHttpRequest.prototype.getAllResponseHeaders = function() {
        if (typeof pageLoaded === "function")
          pageLoaded();
        getAllResponseHeaders.call(this)
      };

    })(XMLHttpRequest.prototype.open,XMLHttpRequest.prototype.getAllResponseHeaders);

} else {
      ActiveXObject = function(progid) {
      var ax = new ActualActiveXObject(progid);
      
      if (progid.toLowerCase() == "microsoft.xmlhttp") {
        var o = {
          _ax: ax,
          _status: "fake",
          responseText: "",
          responseXml: null,
          readyState: 0,
          dataType: 'plain',
          status: 0,
          statusText: 0,
          onReadyStateChange: null,
          onreadystatechange: null
        };
        o._onReadyStateChange = function() {
          var self = o;
          return function() {     
            self.readyState   = self._ax.readyState;
            if (self.readyState == 4) {
            
              self.responseText = self._ax.responseText;
              self.responseXml  = self._ax.responseXml;
              self.status       = self._ax.status;
              self.statusText   = self._ax.statusText;
              
            }
            if (self.onReadyStateChange) {
                self.onReadyStateChange();
            }
            if (self.onreadystatechange) {
                self.onreadystatechange();
            }
          }
        }();
        o.open = function(bstrMethod, bstrUrl, varAsync, bstrUser, bstrPassword) {
          this._ax.onReadyStateChange = this._onReadyStateChange;       
          this._ax.onreadystatechange = this._onReadyStateChange;  
          alert('Intercept');
          return this._ax.open(bstrMethod, bstrUrl, varAsync, bstrUser, bstrPassword);
        };
        o.send = function(varBody) {
          return this._ax.send(varBody);
        };
        o.abort = function() {
            return this._ax.abort();
        }
        o.setRequestHeader = function(k,v) {
            return this._ax.setRequestHeader(k,v)
        }
        o.setrequestheader = function(k,v) {
            return this._ax.setRequestHeader(k,v)
        }
        o.getResponseHeader = function(k) {
            return this._ax.getResponseHeader(k)
        }
        o.getresponseheader = function(k) {
            return this._ax.getResponseHeader(k)
        }
        
      } else if (progid.toLowerCase() == "msxml2.xmlhttp") {
        var o = {
          _ax: ax,
          _status: "fake",
          responseText: "",
          responseXml: null,
          readyState: 0,
          dataType: 'plain',
          status: 0,
          statusText: 0,
          onReadyStateChange: null,
          onreadystatechange: null
        };
        o._onReadyStateChange = function() {
          var self = o;
          return function() {     
            self.readyState   = self._ax.readyState;
            if (self.readyState == 4) {
            
              self.responseText = self._ax.responseText;
              self.responseXml  = self._ax.responseXml;
              self.status       = self._ax.status;
              self.statusText   = self._ax.statusText;
              
            }
            if (self.onReadyStateChange) {
                self.onReadyStateChange();
            }
            if (self.onreadystatechange) {
                self.onreadystatechange();
            }
          }
        }();
        o.open = function(bstrMethod, bstrUrl, varAsync, bstrUser, bstrPassword) {
          this._ax.onReadyStateChange = this._onReadyStateChange;       
          this._ax.onreadystatechange = this._onReadyStateChange;    
          alert('Intercept');
          return this._ax.open(bstrMethod, bstrUrl, varAsync, bstrUser, bstrPassword);
        };
        o.send = function(varBody) {
          return this._ax.send(varBody);
        };
        o.abort = function() {
            return this._ax.abort();
        }
        o.setRequestHeader = function(k,v) {
            return this._ax.setRequestHeader(k,v)
        }
        o.setrequestheader = function(k,v) {
            return this._ax.setRequestHeader(k,v)
        }
        o.getResponseHeader = function(k) {
            return this._ax.getResponseHeader(k)
        }
        o.getresponseheader = function(k) {
            return this._ax.getResponseHeader(k)
        }
      } else {
        var o = ax;
      }
       
      return o;
    }
}