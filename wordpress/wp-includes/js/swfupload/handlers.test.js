const rewire = require("rewire")
const handlers = rewire("./handlers")
const fileDialogStart = handlers.__get__("fileDialogStart")
const uploadStart = handlers.__get__("uploadStart")
const uploadProgress = handlers.__get__("uploadProgress")
const prepareMediaItem = handlers.__get__("prepareMediaItem")
const prepareMediaItemInit = handlers.__get__("prepareMediaItemInit")
const itemAjaxError = handlers.__get__("itemAjaxError")
const deleteSuccess = handlers.__get__("deleteSuccess")
const deleteError = handlers.__get__("deleteError")
const updateMediaForm = handlers.__get__("updateMediaForm")
const uploadSuccess = handlers.__get__("uploadSuccess")
const uploadComplete = handlers.__get__("uploadComplete")
const wpQueueError = handlers.__get__("wpQueueError")
const wpFileError = handlers.__get__("wpFileError")
const fileQueueError = handlers.__get__("fileQueueError")
const fileDialogComplete = handlers.__get__("fileDialogComplete")
const uploadError = handlers.__get__("uploadError")
const cancelUpload = handlers.__get__("cancelUpload")
const switchUploader = handlers.__get__("switchUploader")
const swfuploadPreLoad = handlers.__get__("swfuploadPreLoad")
const swfuploadLoadFailed = handlers.__get__("swfuploadLoadFailed")
// @ponicode
describe("fileDialogStart", () => {
    test("0", () => {
        let callFunction = () => {
            fileDialogStart()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("uploadStart", () => {
    test("0", () => {
        let callFunction = () => {
            uploadStart()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("uploadProgress", () => {
    test("0", () => {
        let callFunction = () => {
            uploadProgress()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("prepareMediaItem", () => {
    test("0", () => {
        let callFunction = () => {
            prepareMediaItem()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("prepareMediaItemInit", () => {
    test("0", () => {
        let callFunction = () => {
            prepareMediaItemInit()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("itemAjaxError", () => {
    test("0", () => {
        let callFunction = () => {
            itemAjaxError()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("deleteSuccess", () => {
    test("0", () => {
        let callFunction = () => {
            deleteSuccess()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("deleteError", () => {
    test("0", () => {
        let callFunction = () => {
            deleteError()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("updateMediaForm", () => {
    test("0", () => {
        let callFunction = () => {
            updateMediaForm()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("uploadSuccess", () => {
    test("0", () => {
        let callFunction = () => {
            uploadSuccess()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("uploadComplete", () => {
    test("0", () => {
        let callFunction = () => {
            uploadComplete()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("wpQueueError", () => {
    test("0", () => {
        let callFunction = () => {
            wpQueueError()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("wpFileError", () => {
    test("0", () => {
        let callFunction = () => {
            wpFileError()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("fileQueueError", () => {
    test("0", () => {
        let callFunction = () => {
            fileQueueError()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("fileDialogComplete", () => {
    test("0", () => {
        let callFunction = () => {
            fileDialogComplete()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("uploadError", () => {
    test("0", () => {
        let callFunction = () => {
            uploadError()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("cancelUpload", () => {
    test("0", () => {
        let callFunction = () => {
            cancelUpload()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("switchUploader", () => {
    test("0", () => {
        let callFunction = () => {
            switchUploader()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("swfuploadPreLoad", () => {
    test("0", () => {
        let callFunction = () => {
            swfuploadPreLoad()
        }
    
        expect(callFunction).not.toThrow()
    })
})

// @ponicode
describe("swfuploadLoadFailed", () => {
    test("0", () => {
        let callFunction = () => {
            swfuploadLoadFailed()
        }
    
        expect(callFunction).not.toThrow()
    })
})
