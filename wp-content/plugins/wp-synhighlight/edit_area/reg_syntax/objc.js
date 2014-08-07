editAreaLoader.load_syntax["objc"] = {
    'COMMENT_SINGLE' : {1: "#", 2: "//"}, 
    'COMMENT_MULTI' : {"/*": "*/"}, 
    'QUOTEMARKS' : {0: "\"", 1: "\'"}, 
    'KEYWORDS' : {
        'keywordgroup1': ["while", "switch", "return", "in", "if", "goto", "foreach", "for", "else", "do", "default", "continue", "case", "@try", "@throw", "@synthesize", "@synchronized", "@selector", "@public", "@protocol", "@protected", "@property", "@private", "@interface", "@implementation", "@finally", "@end", "@encode", "@defs", "@class", "@catch"],
        'keywordgroup2': ["YES", "USHRT_MAX", "ULONG_MAX", "UINT_MAX", "UCHAR_MAX", "true", "TMP_MAX", "stdout", "stdin", "stderr", "SIGTERM", "SIGSEGV", "SIGINT", "SIGILL", "SIG_IGN", "SIGFPE", "SIG_ERR", "SIG_DFL", "SIGABRT", "SHRT_MIN", "SHRT_MAX", "SEEK_SET", "SEEK_END", "SEEK_CUR", "SCHAR_MIN", "SCHAR_MAX", "RAND_MAX", "NULL", "NO", "nil", "Nil", "L_tmpnam", "LONG_MIN", "LONG_MAX", "LDBL_MIN_EXP", "LDBL_MIN", "LDBL_MAX_EXP", "LDBL_MAX", "LDBL_MANT_DIG", "LDBL_EPSILON", "LDBL_DIG", "INT_MIN", "INT_MAX", "HUGE_VAL", "FOPEN_MAX", "FLT_ROUNDS", "FLT_RADIX", "FLT_MIN_EXP", "FLT_MIN", "FLT_MAX_EXP", "FLT_MAX", "FLT_MANT_DIG", "FLT_EPSILON", "FLT_DIG", "FILENAME_MAX", "false", "EXIT_SUCCESS", "EXIT_FAILURE", "errno", "ERANGE", "EOF", "enum", "EDOM", "DBL_MIN_EXP", "DBL_MIN", "DBL_MAX_EXP", "DBL_MAX", "DBL_MANT_DIG", "DBL_EPSILON", "DBL_DIG", "CLOCKS_PER_SEC", "CHAR_MIN", "CHAR_MAX", "CHAR_BIT", "BUFSIZ", "break"],
        'keywordgroup3': ["vsprintf", "vprintf", "vfprintf", "va_start", "va_end", "va_arg", "ungetc", "toupper", "tolower", "tmpname", "tmpfile", "time", "tanh", "tan", "system", "strxfrm", "strtoul", "strtol", "strtok", "strtod", "strstr", "strspn", "strrchr", "strpbrk", "strncpy", "strncmp", "strncat", "strlen", "strftime", "strerror", "strcspn", "strcpy", "strcoll", "strcmp", "strchr", "strcat", "sscanf", "srand", "sqrt", "sprintf", "snprintf", "sizeof", "sinh", "sin", "setvbuf", "setjmp", "setbuf", "scanf", "rewind", "rename", "remove", "realloc", "rand", "qsort", "puts", "putchar", "putc", "printf", "pow", "perror", "offsetof", "modf", "mktime", "memset", "memmove", "memcpy", "memcmp", "memchr", "malloc", "longjmp", "log10", "log", "localtime", "ldiv", "ldexp", "labs", "isxdigit", "isupper", "isspace", "ispunct", "isprint", "islower", "isgraph", "isdigit", "iscntrl", "isalpha", "isalnum", "gmtime", "gets", "getenv", "getchar", "getc", "fwrite", "ftell", "fsetpos", "fseek", "fscanf", "frexp", "freopen", "free", "fread", "fputs", "fputc", "fprintf", "fopen", "fmod", "floor", "fgets", "fgetpos", "fgetc", "fflush", "ferror", "feof", "fclose", "fabs", "exp", "exit", "div", "difftime", "ctime", "cosh", "cos", "clock", "clearerr", "ceil", "calloc", "bsearch", "atol", "atoi", "atof", "atexit", "atan2", "atan", "assert", "asin", "asctime", "acos", "abs", "abort"],
        'keywordgroup4': ["volatile", "void", "va_list", "unsigned", "union", "typedef", "tm", "time_t", "struct", "string", "static", "size_t", "signed", "signal", "short", "SEL", "register", "raise", "ptrdiff_t", "NSZone", "NSRect", "NSRange", "NSPoint", "long", "ldiv_t", "jmp_buf", "int", "IMP", "id", "fpos_t", "float", "FILE", "extern", "double", "div_t", "const", "clock_t", "Class", "char", "BOOL", "auto"],
        'keywordgroup5': ["NSXMLParser", "NSXMLNode", "NSXMLElement", "NSXMLDTDNode", "NSXMLDTD", "NSXMLDocument", "NSWhoseSpecifier", "NSValueTransformer", "NSValue", "NSUserDefaults", "NSURLResponse", "NSURLRequest", "NSURLProtocol", "NSURLProtectionSpace", "NSURLHandle", "NSURLDownload", "NSURLCredentialStorage", "NSURLCredential", "NSURLConnection", "NSURLCache", "NSURLAuthenticationChallenge", "NSURL", "NSUniqueIDSpecifier", "NSUndoManager", "NSUnarchiver", "NSTimeZone", "NSTimer", "NSThread", "NSTask", "NSString", "NSStream", "NSSpellServer", "NSSpecifierTest", "NSSortDescriptor", "NSSocketPortNameServer", "NSSocketPort", "NSSetCommand", "NSSet", "NSSerializer", "NSScriptWhoseTest", "NSScriptSuiteRegistry", "NSScriptObjectSpecifier", "NSScriptExecutionContext", "NSScriptCommandDescription", "NSScriptCommand", "NSScriptCoercionHandler", "NSScriptClassDescription", "NSScanner", "NSRunLoop", "NSRelativeSpecifier", "NSRecursiveLock", "NSRangeSpecifier", "NSRandomSpecifier", "NSQuitCommand", "NSProxy", "NSProtocolChecker", "NSPropertySpecifier", "NSPropertyListSerialization", "NSProcessInfo", "NSPredicate", "NSPositionalSpecifier", "NSPortNameServer", "NSPortMessage", "NSPortCoder", "NSPort", "NSPointerFunctions", "NSPointerArray", "NSPipe", "NSOutputStream", "NSOperationQueue", "NSOperation", "NSObject", "NSNumberFormatter", "NSNumber", "NSNull", "NSNotificationQueue", "NSNotificationCenter", "NSNotification", "NSNetServiceBrowser", "NSNetService", "NSNameSpecifier", "NSMutableURLRequest", "NSMutableString", "NSMutableSet", "NSMutableIndexSet", "NSMutableDictionary", "NSMutableData", "NSMutableCharacterSet", "NSMutableAttributedString", "NSMutableArray", "NSMoveCommand", "NSMiddleSpecifier", "NSMethodSignature", "NSMetadataQueryResultGroup", "NSMetadataQueryAttributeValueTuple", "NSMetadataQuery", "NSMetadataItem", "NSMessagePortNameServer", "NSMessagePort", "NSMapTable", "NSMachPort", "NSMachBootstrapServer", "NSLogicalTest", "NSLock", "NSLocale", "NSKeyedUnarchiver", "NSKeyedArchiver", "NSInvocationOperation", "NSInvocation", "NSInputStream", "NSIndexSpecifier", "NSIndexSet", "NSIndexPath", "NSHTTPURLResponse", "NSHTTPCookieStorage", "NSHTTPCookie", "NSHost", "NSHashTable", "NSGetCommand", "NSGarbageCollector", "NSFormatter", "NSFileManager", "NSFileHandle", "NSExpression", "NSExistsCommand", "NSException", "NSError", "NSEnumerator", "NSDistributedNotificationCenter", "NSDistributedLock", "NSDistantObjectRequest", "NSDistantObject", "NSDirectoryEnumerator", "NSDictionary", "NSDeserializer", "NSDeleteCommand", "NSDecimalNumberHandler", "NSDecimalNumber", "NSDateFormatter", "NSDateComponents", "NSDate", "NSData", "NSCreateCommand", "NSCountedSet", "NSCountCommand", "NSConnection", "NSConditionLock", "NSCondition", "NSCompoundPredicate", "NSComparisonPredicate", "NSCoder", "NSCloseCommand", "NSCloneCommand", "NSClassDescription", "NSCharacterSet", "NSCalendarDate", "NSCalendar", "NSCachedURLResponse", "NSBundle", "NSAutoreleasePool", "NSAttributedString", "NSAssertionHandler", "NSArray", "NSArchiver", "NSAppleScript", "NSAppleEventManager", "NSAppleEventDescriptor", "NSAffineTransform"],
        'keywordgroup6': ["NSURLProtocolClient", "NSURLHandleClient", "NSURLClient", "NSURLAuthenticationChallengeSender", "NSScriptObjectSpecifiers", "NSScriptKeyValueCoding", "NSScriptingComparisonMethods", "NSObjCTypeSerializationCallBack", "NSMutableCopying", "NSLocking", "NSKeyValueObserving", "NSKeyValueCoding", "NSFastEnumeration", "NSErrorRecoveryAttempting", "NSDecimalNumberBehaviors", "NSCopying", "NSComparisonMethods", "NSCoding"],
        'keywordgroup7': ["NSWorkspace", "NSWindowController", "NSWindow", "NSViewController", "NSViewAnimation", "NSView", "NSUserDefaultsController", "NSTypesetter", "NSTreeNode", "NSTreeController", "NSTrackingArea", "NSToolbarItemGroup", "NSToolbarItem", "NSToolbar", "NSTokenFieldCell", "NSTokenField", "NSTextView", "NSTextTableBlock", "NSTextTable", "NSTextTab", "NSTextStorage", "NSTextList", "NSTextFieldCell", "NSTextField", "NSTextContainer", "NSTextBlock", "NSTextAttachmentCell", "NSTextAttachment", "NSText", "NSTabViewItem", "NSTabView", "NSTableView", "NSTableHeaderView", "NSTableHeaderCell", "NSTableColumn", "NSStepperCell", "NSStepper", "NSStatusItem", "NSStatusBar", "NSSplitView", "NSSpellChecker", "NSSpeechSynthesizer", "NSSpeechRecognizer", "NSSound", "NSSliderCell", "NSSlider", "NSSimpleHorizontalTypesetter", "NSShadow", "NSSegmentedControl", "NSSegmentedCell", "NSSecureTextFieldCell", "NSSecureTextField", "NSSearchFieldCell", "NSSearchField", "NSScrollView", "NSScroller", "NSScreen", "NSSavePanel", "NSRulerView", "NSRulerMarker", "NSRuleEditor", "NSResponder", "NSQuickDrawView", "NSProgressIndicator", "NSPrintPanel", "NSPrintOperation", "NSPrintInfo", "NSPrinter", "NSPredicateEditorRowTemplate", "NSPredicateEditor", "NSPopUpButtonCell", "NSPopUpButton", "NSPICTImageRep", "NSPersistentDocument", "NSPDFImageRep", "NSPathControl", "NSPathComponentCell", "NSPathCell", "NSPasteboard", "NSParagraphStyle", "NSPanel", "NSPageLayout", "NSOutlineView", "NSOpenPanel", "NSOpenGLView", "NSOpenGLPixelFormat", "NSOpenGLPixelBuffer", "NSOpenGLContext", "NSObjectController", "NSNibOutletConnector", "NSNibControlConnector", "NSNibConnector", "NSNib", "NSMutableParagraphStyle", "NSMovieView", "NSMovie", "NSMenuView", "NSMenuItemCell", "NSMenuItem", "NSMenu", "NSMatrix", "NSLevelIndicatorCell", "NSLevelIndicator", "NSLayoutManager", "NSInputServer", "NSInputManager", "NSImageView", "NSImageRep", "NSImageCell", "NSImage", "NSHelpManager", "NSGraphicsContext", "NSGradient", "NSGlyphInfo", "NSGlyphGenerator", "NSFormCell", "NSForm", "NSFontPanel", "NSFontManager", "NSFontDescriptor", "NSFont", "NSFileWrapper", "NSEvent", "NSEPSImageRep", "NSDrawer", "NSDocumentController", "NSDocument", "NSDockTile", "NSDictionaryController", "NSDatePickerCell", "NSDatePicker", "NSCustomImageRep", "NSCursor", "NSController", "NSControl", "NSComboBoxCell", "NSComboBox", "NSColorWell", "NSColorSpace", "NSColorPicker", "NSColorPanel", "NSColorList", "NSColor", "NSCollectionViewItem", "NSCollectionView", "NSClipView", "NSCIImageRep", "NSCell", "NSCachedImageRep", "NSButtonCell", "NSButton", "NSBrowserCell", "NSBrowser", "NSBox", "NSBitmapImageRep", "NSBezierPath", "NSATSTypesetter", "NSArrayController", "NSApplication", "NSAnimationContext", "NSAnimation", "NSAlert", "NSActionCell"],
        'keywordgroup8': ["NSWindowScripting", "NSValidatedUserInterfaceItem", "NSUserInterfaceValidations", "NSToolTipOwner", "NSToolbarItemValidation", "NSTextInput", "NSTableDataSource", "NSServicesRequests", "NSPrintPanelAccessorizing", "NSPlaceholders", "NSPathControlDelegate", "NSPathCellDelegate", "NSOutlineViewDataSource", "NSNibAwaking", "NSMenuValidation", "NSKeyValueBindingCreation", "NSInputServiceProvider", "NSInputServerMouseTracker", "NSIgnoreMisspelledWords", "NSGlyphStorage", "NSFontPanelValidation", "NSEditorRegistration", "NSEditor", "NSDraggingSource", "NSDraggingInfo", "NSDraggingDestination", "NSDictionaryControllerKeyValuePair", "NSComboBoxDataSource", "NSComboBoxCellDataSource", "NSColorPickingDefault", "NSColorPickingCustom", "NSChangeSpelling", "NSAnimatablePropertyContainer", "NSAccessibility"],
        'keywordgroup9': ["NSRelationshipDescription", "NSPropertyMapping", "NSPropertyDescription", "NSPersistentStoreCoordinator", "NSPersistentStore", "NSMigrationManager", "NSMappingModel", "NSManagedObjectModel", "NSManagedObjectID", "NSManagedObjectContext", "NSManagedObject", "NSFetchRequestExpression", "NSFetchRequest", "NSFetchedPropertyDescription", "NSEntityMigrationPolicy", "NSEntityMapping", "NSEntityDescription", "NSAttributeDescription", "NSAtomicStoreCacheNode", "NSAtomicStore"]
}, 
    'OPERATORS' : ["=", "+", "-", "*", "/", "!", "%", "^", "&", ":"], 
    'DELIMITERS' : [ '(', ')', '[', ']', '{', '}' ], 
    'STYLES' : { 
        'COMMENTS' : 'color: #6e371a;', 
        'QUOTESMARKS' : 'color: #bf1d1a;', 
        'KEYWORDS' : { 
        'keywordgroup1': 'color: #a61390;',
        'keywordgroup2': 'color: #a61390;',
        'keywordgroup3': 'color: #a61390;',
        'keywordgroup4': 'color: #a61390;',
        'keywordgroup5': 'color: #400080;',
        'keywordgroup6': 'color: #2a6f76;',
        'keywordgroup7': 'color: #400080;',
        'keywordgroup8': 'color: #2a6f76;',
        'keywordgroup9': 'color: #400080;'    }, 
       'OPERATORS' : 'color: #002200;', 
        'DELIMITERS' : 'color: #002200;' 
    } 
}; 